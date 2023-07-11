<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admission;
use App\Models\AddFee;
use Auth;
use Hash;
use DB;
class StudentController extends Controller
{
    public function admission_page()
    {
        return view('admission');
    }
    public function admission(Request $request)
    {
        $request->validate([
            'class' => 'required|in:class 6,class 7,class 8,class 9,class 10',
            'group' => 'in:null,science,commerce,arts',
            'year' => 'required',
            'fname' => 'required',
            'lname' => 'required',
            'roll' => 'required',
            'father' => 'required',
            'mother' => 'required',
            'phone' => 'required',
            'address' => 'required',
            'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
        ]);

        $image = $request->file('image');
        $imageName = time().'.'.$image->getClientOriginalExtension();
        $image->move('students',$imageName);
        // if($request->group=='null')
        // {
        //     $request->group=null;
        // }
        $new = new Admission();
        $new->class=$request->class;
        $new->group=$request->group;
        $new->year=$request->year;
        $new->fname=$request->fname;
        $new->lname=$request->lname;
        $new->roll=$request->roll;
        $new->father=$request->father;
        $new->mother=$request->mother;
        $new->phone=$request->phone;
        $new->address=$request->address;
        $new->image=$imageName;
        $new->save();
        return redirect()->back()->with('success','Add Student Successfully');
    }
    public function all_student()
    {
        $admissions = Admission::all();
        $class = null;
        $year = null;
        $serial=null;
        return view('Student.all-student',compact('admissions','class','year','serial'));
    }
    public function search_student(Request $request)
    {
        $admissions = Admission::all();
        $class = $request->class;
        $year = $request->year;
        $serial=1;
        return view('Student.all-student',compact('admissions','class','year','serial'));
    }
    public function student_profile($id)
    {
        $data = DB::select('SELECT * FROM admissions WHERE id = ?', [$id]);
        return view('Student.student_profile',compact('data'));
    }
    public function delete_student($id){
        DB::delete('delete from admissions where id = ?',[$id]);
        return redirect()->route('user.student');
    }
    public function edit_student($id){
        $data = DB::select('SELECT * FROM admissions WHERE id = ?', [$id]);
        return view('Student.Edit_profile',compact('data'));
    }
    public function edit_student_profile(Request $request,$id)
    {
        $request->validate([
            'class' => 'required|in:class 6,class 7,class 8,class 9,class 10',
            'group' => 'in:null,science,commerce,arts',
            'year' => 'required',
            'fname' => 'required',
            'lname' => 'required',
            'roll' => 'required',
            'father' => 'required',
            'mother' => 'required',
            'phone' => 'required',
            'address' => 'required',
            'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
        ]);

        $image = $request->file('image');
        $imageName = time().'.'.$image->getClientOriginalExtension();
        $image->move('students',$imageName);
        // if($request->group=='null')
        // {
        //     $request->group=null;
        // }
        $new = Admission::findOrFail($id);
        //$new = new Admission();
        $new->class=$request->class;
        $new->group=$request->group;
        $new->year=$request->year;
        $new->fname=$request->fname;
        $new->lname=$request->lname;
        $new->roll=$request->roll;
        $new->father=$request->father;
        $new->mother=$request->mother;
        $new->phone=$request->phone;
        $new->address=$request->address;
        $new->image=$imageName;
        $new->save();
        return redirect()->back()->with('success','Update Student Details Successfully');
    }
    public function admission_fee($id)
    {
        $data = DB::select('SELECT * FROM admissions WHERE id = ?', [$id]);
        $fees = DB::select('SELECT * FROM add_fees ');
        $student_fee_type = 'Admission';
        return view('student.admission_fee',compact('data','fees','student_fee_type'));
    }
    public function add_fee_page()
    {
        return view('add_fee');
    }
    public function add_fee(Request $request)
    {
        $request->validate([
            'fee_type' => 'required',
            'fee_title' => 'required',
            'class' => 'required|in:class 6,class 7,class 8,class 9,class 10',
            'group' => 'in:null,science,commerce,arts',
            'year' => 'required',
            'fee' => 'required',
        ]);
        // if($request->group=='null')
        // {
            //     $request->group=null;
            // }
            $new = new AddFee();
            $new->fee_type=$request->fee_type;
            $new->fee_title=$request->fee_title;
            $new->class=$request->class;
            $new->group=$request->group;
            $new->year=$request->year;
            $new->fee=$request->fee;
            $new->save();
            return redirect()->back()->with('success','Add New Fee Successfully');
        }
        public function midturm_fee($id)
        {
            $data = DB::select('SELECT * FROM admissions WHERE id = ?', [$id]);
            $fees = DB::select('SELECT * FROM add_fees ');
            $student_fee_type = 'Midturm';
            return view('student.admission_fee',compact('data','fees','student_fee_type'));
        }
        public function final_fee($id)
        {
            $data = DB::select('SELECT * FROM admissions WHERE id = ?', [$id]);
            $fees = DB::select('SELECT * FROM add_fees ');
            $student_fee_type = 'Final';
            return view('student.admission_fee',compact('data','fees','student_fee_type'));
        }
        public function fee_list_page()
        {
            $fee_lists = AddFee::all();
            $class = null;
            $year = null;
            $serial=null;
            return view('fee_list_page',compact('fee_lists','class','year','serial'));
        }
        public function fee_list(Request $request)
        {
            $fee_lists = AddFee::all();
            $class = $request->class;
            $year = $request->year;
            $serial=1;
            return view('fee_list_page',compact('fee_lists','class','year','serial'));
        }
        public function delete_fee_list($id){
            DB::delete('delete from add_fees where id = ?',[$id]);
            return redirect()->route('fee_list_page.student');
        }
        public function edit_fee_list($id){
            $data = DB::select('SELECT * FROM add_fees WHERE id = ?', [$id]);
            return view('edit_fee_list',compact('data'));
        }
        public function update_fee(Request $request,$id)
        {
            $request->validate([
                'fee_type' => 'required',
                'fee_title' => 'required',
                'class' => 'required|in:class 6,class 7,class 8,class 9,class 10',
                'group' => 'in:null,science,commerce,arts',
                'year' => 'required',
                'fee' => 'required',
            ]);
            // if($request->group=='null')
            // {
                //     $request->group=null;
                // }
                $new = AddFee::findOrFail($id);
                $new->fee_type=$request->fee_type;
                $new->fee_title=$request->fee_title;
                $new->class=$request->class;
                $new->group=$request->group;
                $new->year=$request->year;
                $new->fee=$request->fee;
                $new->save();
            return redirect()->back()->with('success','Update Fee Successfully');
        }
        public function student_admission_fee($id){
            $new = Admission::findOrFail($id);
            $new->admission_fee="paid";
            $new->save();
            // return view('student.student_profile');
            return redirect()->route('user.student');
        }
        public function student_midturm_fee($id){
            $new = Admission::findOrFail($id);
            $new->midturm_fee="paid";
            $new->save();
            // return view('student.student_profile');
            return redirect()->route('user.student');
        }
        public function student_final_fee($id){
            $new = Admission::findOrFail($id);
            $new->final_fee="paid";
            $new->save();
            // return view('student.student_profile');
            return redirect()->route('user.student');
        }
    }
