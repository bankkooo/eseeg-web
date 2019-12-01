<?php

namespace App\Http\Controllers;

use App\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\Mail;
use App\Mail\WelcomeUser;


class DoctorController extends Controller
{

    public function showListDoctor()
    {
        $users = DB::table('users')->get();
        return view('Advice', ['users' => $users]);
    }

    public function showChart($id)
    {
        // $patient = DB::table('patient')->get();
        // if($id == "1"){
            return view('Patient_Log');
        // }
        // else {
            // return view('home');    
        // }
        // return view('home');  
    }

    public function showChart_test()
    {
        return view('chart.Patient_Log');
    }
    public function showListPatient()
    {
        $patients_EM = DB::table('patient')
            ->where('type_disease', 'EM')->get();;

        $patients_NM = DB::table('patient')
            ->where('type_disease', 'NM')->get();;

        $patients_NT = DB::table('patient')
            ->where('type_disease', 'NT')->get();;
        return view('Patient', ['patients_EM' => $patients_EM, 'patients_NM' => $patients_NM, 'patients_NT' => $patients_NT]);
    }
    public function showListEM()
    {
        $users = Auth::user();
        $patient = DB::table('patient')
            ->where('type_disease', 'EM')->get();
        return view('Emergency', ['users' => $users, 'patient' => $patient]);
    }
}
