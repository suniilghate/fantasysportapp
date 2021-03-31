<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Repositories\UserRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Config;
use Response;

class UserController extends AppBaseController
{
    /** @var  UserRepository */
    private $userRepository;

    public function __construct(UserRepository $userRepo)
    {
        $this->userRepository = $userRepo;
    }

    /**
     * Display a listing of the User.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $users = $this->userRepository->all();
        
        return view('users.index')
            ->with('users', $users);
    }

    /**
     * Show the form for creating a new User.
     *
     * @return Response
     */
    public function create()
    {
        return view('users.create');
    }

    /**
     * Store a newly created User in storage.
     *
     * @param CreateUserRequest $request
     *
     * @return Response
     */
    public function store(CreateUserRequest $request)
    {
        $input = $request->all();

        $user = $this->userRepository->create($input);

        Flash::success('User saved successfully.');

        return redirect(route('users.index'));
    }

    /**
     * Display the specified User.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $user = $this->userRepository->find($id);

        if (empty($user)) {
            Flash::error('User not found');

            return redirect(route('users.index'));
        }

        return view('users.show')->with('user', $user);
    }

    /**
     * Show the form for editing the specified User.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $user = $this->userRepository->find($id);

        if (empty($user)) {
            Flash::error('User not found');

            return redirect(route('users.index'));
        }

        return view('users.edit')->with('user', $user);
    }

    /**
     * Update the specified User in storage.
     *
     * @param int $id
     * @param UpdateUserRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateUserRequest $request)
    {
        $user = $this->userRepository->find($id);

        if (empty($user)) {
            Flash::error('User not found');

            return redirect(route('users.index'));
        }

        $user = $this->userRepository->update($request->all(), $id);

        Flash::success('User updated successfully.');

        return redirect(route('users.index'));
    }

    /**
     * Remove the specified User from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $user = $this->userRepository->find($id);

        if (empty($user)) {
            Flash::error('User not found');

            return redirect(route('users.index'));
        }

        $this->userRepository->delete($id);

        Flash::success('User deleted successfully.');

        return redirect(route('users.index'));
    }

    /**
     * Add cash to wallet.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function add_cash(Request $request)
    {
        //We can record the transaction request and response to db at present I am sending back the required request parameters only
        $returnRequest = ['key' => Config::get('custom.razor_key'), 'amount' => $request->amount * 100, 'companyname' => 'FSA', 'description' => 'Wallet refill', 'prefill' => ['name' => Auth::user()->name, 'email' => Auth::user()->email, 'contact' => (!empty(Auth::user()->mobile)) ? Auth::user()->mobile : '999-999-9999']];
        return response()->json([
            'success' => json_encode($returnRequest)
        ]);
    }

    /**
     * Add cash to wallet.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function save_transaction(Request $request)
    {
        //We have to record the transaction to db and do the wallet updates
        $input = $request->all();
        //Insert the transaction amount to user wallet
        $userWallet = $this->userRepository->updateWallet($input);
         
        //dd($request->all());
        return response()->json([
            'success' => json_encode($userWallet)
        ]);
    }

    public function save_loby_players(Request $request)
    {
        $input = $request->all();
        $userContest = $this->userRepository->joinContest($input);
        
        return response()->json([
            'success' => json_encode($userContest)
        ]);
    }
}
