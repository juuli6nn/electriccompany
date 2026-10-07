<?php

namespace App\Controllers;

use App\Models\CustomerAccountModel;
use App\Models\UserModel;

class Home extends BaseController
{
    protected $customerModel;

    public function __construct()
    {
        $this->customerModel = new CustomerAccountModel();
    }

    // LANDING PAGE
    public function index()
    {
        $data = [
            'title' => 'PuiHaha Electric - Reliable Energy Solutions',
            'page' => 'home'
        ];
        return view('home', $data);
    }

    // PAGINATION & CRUD FUNCTIONS
    
    public function dashboard()
    {
        // Require login to view this page
        if (session()->get('isLogged') !== true) {
            return redirect()->to('/login');
        }

        $keyword = $this->request->getGet('search');
        $status = $this->request->getGet('status');
        $type = $this->request->getGet('type');
        $perPage = 10;

        if ($keyword) {
            $accounts = $this->customerModel->searchAccounts($keyword, $perPage);
        } elseif ($status) {
            $accounts = $this->customerModel->getAccountsByStatus($status, $perPage);
        } elseif ($type) {
            $accounts = $this->customerModel->getAccountsByType($type, $perPage);
        } else {
            $accounts = $this->customerModel->getAccountsPaginated($perPage);
        }

        $data = [
            'accounts' => $accounts,
            'pager' => $this->customerModel->pager,
            'total_accounts' => $this->customerModel->getTotalAccounts(),
            'active_accounts' => $this->customerModel->getCountByStatus('active'),
            'inactive_accounts' => $this->customerModel->getCountByStatus('inactive'),
            'suspended_accounts' => $this->customerModel->getCountByStatus('suspended'),
            'current_page' => $this->request->getGet('page') ?? 1,
            'search_keyword' => $keyword,
            'filter_status' => $status,
            'filter_type' => $type,
            'username' => session()->get('username') // Pass username for the header
        ];

        // I changed this to point to the dashboard view since the login 
        // system redirects to dashboard upon success.
        return view('dashboard', $data);
    }

    public function viewAccount($id)
    {
        if (session()->get('isLogged') !== true) {
            return redirect()->to('/login');
        }

        $account = $this->customerModel->find($id);

        if (!$account) {
            return redirect()->to('/')->with('error', 'Account not found');
        }

        $data = [
            'account' => $account
        ];

        return view('account_view', $data);
    }

    public function createAccount()
    {
        if (session()->get('isLogged') !== true) return redirect()->to('/login');
        return view('account_form');
    }

    public function storeAccount()
    {
        if (session()->get('isLogged') !== true) return redirect()->to('/login');
        
        $data = [
            'account_number' => $this->request->getPost('account_number'),
            'customer_name' => $this->request->getPost('customer_name'),
            'address' => $this->request->getPost('address'),
            'phone' => $this->request->getPost('phone'),
            'email' => $this->request->getPost('email'),
            'meter_number' => $this->request->getPost('meter_number'),
            'connection_type' => $this->request->getPost('connection_type') ?? 'residential',
            'status' => $this->request->getPost('status') ?? 'active',
        ];
        
        $this->customerModel->insert($data);
        return redirect()->to('/dashboard')->with('success', 'Account created successfully!');
    }

    public function editAccount($id)
    {
        if (session()->get('isLogged') !== true) return redirect()->to('/login');
        
        $account = $this->customerModel->find($id);
        if (!$account) return redirect()->to('/dashboard')->with('error', 'Account not found');
        
        return view('account_form', ['account' => $account]);
    }

    public function updateAccount($id)
    {
        if (session()->get('isLogged') !== true) return redirect()->to('/login');
        
        $data = [
            'account_number' => $this->request->getPost('account_number'),
            'customer_name' => $this->request->getPost('customer_name'),
            'address' => $this->request->getPost('address'),
            'phone' => $this->request->getPost('phone'),
            'email' => $this->request->getPost('email'),
            'meter_number' => $this->request->getPost('meter_number'),
            'connection_type' => $this->request->getPost('connection_type'),
            'status' => $this->request->getPost('status'),
        ];
        
        $this->customerModel->update($id, $data);
        return redirect()->to('/dashboard')->with('success', 'Account updated successfully!');
    }

    public function deleteAccount($id)
    {
        if (session()->get('isLogged') !== true) return redirect()->to('/login');
        
        $this->customerModel->delete($id);
        return redirect()->to('/dashboard')->with('success', 'Account deleted successfully!');
    }

    // LOGIN & AUTHENTICATION FUNCTIONS

    public function login()
    {
        if (session()->get('isLogged') === true) {
            return redirect()->to('/dashboard');
        }

        if ($this->request->getMethod() === 'POST') {
            $rules = [
                'username' => 'required|max_length[100]',
                'password' => 'required|max_length[255]',
            ];

            if (! $this->validate($rules)) {
                return redirect()->back()->withInput()->with('error', 'Enter both your username and password.');
            }

            $credentials = $this->request->getPost(['username', 'password']);
            $user = (new UserModel())->where('username', $credentials['username'])->first();

            $validPassword = $user !== null
                && (password_verify($credentials['password'], $user['password'])
                    || hash_equals((string) $user['password'], (string) $credentials['password']));

            if (! $validPassword) {
                return redirect()->back()->withInput()->with('error', 'Invalid username or password.');
            }

            session()->regenerate();
            session()->set([
                'isLogged' => true,
                'user_id'  => $user['id'],
                'username' => $user['username'],
            ]);

            return redirect()->to('/dashboard');
        }

        return view('login');
    }

    public function logout()
    {
        if (session()->get('isLogged') !== true) {
            return redirect()->to('/login');
        }

        session()->destroy();
        return redirect()->to('/login')->with('success', 'You have been logged out.');
    }
}