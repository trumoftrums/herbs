<?php

namespace Vanguard\Http\Controllers;
use Illuminate\Support\Facades\Input;
use Vanguard\Http\Requests\User\UpdateUserRequest;
use Vanguard\News;
use Vanguard\QA;
use Vanguard\Repositories\News\NewsRepository;
use Vanguard\Repositories\QA\QARepository;
use Vanguard\Repositories\User\UserRepository;
use Auth;
use Vanguard\Repositories\BienDong\BienDongRepository;
use Request;
use Vanguard\BienDong;
use Vanguard\Http\Requests\Invest\BienDongRequest;
use Vanguard\Support\Enum\UserStatus;
use Vanguard\TypeNews;
use Vanguard\User;


/**
 * Class UsersController
 * @package Vanguard\Http\Controllers
 */
class ManageQAController extends Controller
{

    private $news;
    public function __construct(QARepository $qa)
    {
        $this->middleware('auth');
        $this->middleware('permission:qaAdmin.manage');
        $this->qa = $qa;
    }
    public function listQA()
    {
        $perPage = 10;
        $statusCurr = Input::get('status');
        $listQAs = $this->qa->paginate($perPage, '', Input::get('status'));

        return view('manage-qa.list-qas', compact('listQAs', 'statusCurr'));
    }
    public function createQA()
    {
        $edit = false;

        return view('manage-qa.add-qas', compact('edit'));
    }
    public function addQA()
    {
        $params = Input::all();
        $this->qa->create($params);

        return redirect()->route('qaadmin.create')
            ->withSuccess(trans('Thêm hỏi đáp mới thành công!'));
    }

    public function editQA($id)
    {
        $edit = true;
        $qa = QA::find($id);

        return view('manage-qa.add-qas', compact('edit', 'qa'));
    }
    public function updateQA($id)
    {
        $params = Input::all();
        $this->qa->update($params, $id);

        return redirect()->route('qaadmin.edit',$id)
            ->withSuccess(trans('Cập nhật hỏi đáp thành công!'));
    }

    public function deleteQA($id)
    {
        $this->qa->delete($id);

        return redirect()->route('qaadmin.list')
            ->withSuccess('Xóa hỏi đáp thành công!');
    }
}