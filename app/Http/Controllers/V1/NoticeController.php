<?php

namespace App\Http\Controllers\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\Notice\NoticeStoreRequest;
use App\Http\Requests\Notice\NoticeUpdateRequest;
use App\Services\Notice\Concretes\NoticeService;
use App\Services\Notice\Models\Notice;
use App\Services\User\Concretes\UserService;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

/**
 * NoticeController
 */
class NoticeController extends Controller
{
    /**
     * @var NoticeService
     */
    private $noticeService;

    /**
     * @var UserService
     */
    private $userService;

    /**
     * @param NoticeService $noticeService
     * @param UserService $userService
     */
    public function __construct(NoticeService $noticeService, UserService $userService)
    {
        $this->noticeService = $noticeService;
        $this->userService = $userService;
    }

    /**
     * Return the view list of notices
     *
     * @return View
     */
    public function index(): View
    {
        $notices = $this->noticeService->paginate();
        $users = $this->userService->all();

        return view('notices.index', compact('notices', 'users'))
            ->with(request()->input('page'));
    }

    /**
     * Store new notice entity
     *
     * @param NoticeStoreRequest $request
     * @return RedirectResponse
     */
    public function store(NoticeStoreRequest $request): RedirectResponse
    {
        $this->noticeService->store($request->all());

        return redirect()->route('notice.index');
    }

    /**
     * Show the view of one notice
     *
     * @param int $id
     * @return View
     */
    public function show(int $id): View
    {
        $notice = $this->noticeService->findOrFail($id);

        return view('notices.show', compact('notice'));
    }

    /**
     * Show edit notice view
     *
     * @param int $id
     * @return View
     */
    public function edit(int $id): View
    {
        $notice = $this->noticeService->findOrFail($id);
        $users = $this->userService->all();

        return view('notices.edit', compact('notice','users'));
    }

    /**
     * Update one notice
     *
     * @param NoticeUpdateRequest $request
     * @param int $id
     * @return RedirectResponse
     */
    public function update(NoticeUpdateRequest $request, int $id): RedirectResponse
    {
        $this->noticeService->update($request->all(), $id);

        return redirect()->route('notice.index')
            ->with('success', 'notices updated successfully');
    }


    /**
     * Delete one notice
     * @param $id
     * @return RedirectResponse
     */
    public function destroy($id): RedirectResponse
    {
        $this->noticeService->destory($id);

        return redirect()->route('notice.index');
    }
}
