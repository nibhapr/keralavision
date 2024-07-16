<?php

namespace App\Http\Controllers\Admin;


use App\Classes\Files;
use App\Classes\Reply;
use App\Http\Controllers\AdminBaseController;
use App\Http\Requests\Admin\Expenses\CreateRequest;
use App\Http\Requests\Admin\Expenses\DeleteRequest;
use App\Http\Requests\Admin\Expenses\IndexRequest;
use App\Http\Requests\Admin\Expenses\UpdateRequest;
use App\Models\Expense;
use App\Models\Employee;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\View;
use Yajra\DataTables\Facades\DataTables;

class ExpensesController extends AdminBaseController
{

    /**
     * ExpensesController constructor.
     */
    public function __construct()
    {
        parent::__construct();
        $this->data['inventoryActive'] = 'active';
        $this->data['pageTitle'] = 'Insurance';
    }

    /**
     * @param IndexRequest $request
     * @return \Illuminate\Contracts\View\View
     */
    public function index(IndexRequest $request)
    {
        $this->data['expenses'] = Expense::with('employee')->get();
        $this->data['expensesActive'] = 'active';

        return View::make('admin.expenses.index', $this->data);
    }

    /**
     * @return mixed
     * @throws \Exception
     */
    public function ajax_expenses()
    {
        $result = Expense::orderBy('created_at', 'desc');

        return datatables()->eloquent($result)
            ->addColumn('check', function ($row) {
                return '<input type="checkbox" class="form-check-input select-table-row"  id="datatable-row-' . $row->id . '"  name="datatable_ids[]" value="' . $row->id . '" data-type="blog" onclick="dataTableRowCheck(' . $row->id . ',this)">';
            })
            ->editColumn('name', function ($row) {
                return $row->name;
            })
            ->editColumn('employee', function ($row) {
                return $row->employee->fullName ?? '-';
            })
            ->editColumn('price', function ($row) {
                return $row->price;
            })
            ->editColumn('purchaseDate', function ($row) {
                return date('d-M-Y', strtotime($row->purchaseDate));
            })
            ->addColumn('action', '
                        <p><a  class="btn btn-sm purple list-index"   href="{{ route(\'admin.expenses.edit\',$id)}}" ><i class="fa fa-edit"></i> View/Edit</a></p>
                            <p><a href="javascript:;"   onclick="del(\'{{ $id }}\',\'{{ $itemName }}\');return false;" class="btn btn-sm red list-index">
                        <i class="fa fa-trash"></i> Delete</a></p>')
            ->addIndexColumn()
            ->rawColumns(['name', 'action', 'check'])
            ->toJson();
    }

    public function create()
    {
        $this->employees = Employee::selectRaw('CONCAT(fullName, " (EmpID:", employeeID,")") as full_name, id')
        ->where('status', '=', 'active')
        ->pluck('full_name', 'id');
        $this->data['expensesAddActive'] = 'active';
        return View::make('admin.expenses.create', $this->data);
    }

    /**
     * @param CreateRequest $request
     * @return array
     * @throws \Exception
     */
    public function store(CreateRequest $request)
    {
        $request->purchaseDate = Carbon::createFromFormat('d-m-Y', $request->purchaseDate)->format('Y-m-d');
        $request["employee_id"] = $request->employeeId;
        $expense = Expense::create($request->toArray());

        if ($request->hasFile('bill')) {
            $file = new Files();
            $filename = $file->upload(Request::file('bill'), 'expense/bills', null, null, false);
            $expense->bill = $filename;
            $expense->save();
        }

        return Reply::redirect(route('admin.expenses.index'), 'Expense successfully created');
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\View
     */
    public function edit($id)
    {
        $this->data['expense'] = Expense::find($id);
        return View::make('admin.expenses.edit', $this->data);
    }

    /**
     * @param UpdateRequest $request
     * @param $id
     * @return array
     * @throws \Exception
     */
    public function update(UpdateRequest $request, $id)
    {
        $expense = Expense::findOrFail($id);

        $expense->update($request->toArray());

        $filename = $request->billhidden;

        // If file is uploaded
        if ($request->hasFile('bill')) {
            $file = new Files();
            $filename = $file->upload(Input::file('bill'), 'expense/bills', null, null, false);
        }

        $expense->bill = $filename;
        $expense->save();

        return Reply::redirect(route('admin.expenses.index'), 'Expense successfully updated');
    }

    /**
     * @param DeleteRequest $request
     * @param $id
     * @return array
     */
    public function destroy(DeleteRequest $request, $id)
    {
        Expense::destroy($id);

        return Reply::success('Delete Successfully');
    }
}
