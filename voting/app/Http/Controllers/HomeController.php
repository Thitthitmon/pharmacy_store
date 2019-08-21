<?php

namespace Voting\Http\Controllers;

use Illuminate\Http\Request;
use Voting\Common\DBCommon as DbCommon;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
use Voting\Export\VotingExport;
use Voting\Export\VotingExportSearch;
use Maatwebsite\Excel\Facades\Excel as MaatExcel;

use Session;



class HomeController extends Controller
{
    
    private $dbCommon = null;
    private $holderName = 'MISSUM2019';
    private $userId = 0;
    /**
     * Create a new controller instance.
     *
     * @return void
     */    
    public function __construct( \Maatwebsite\Excel\Exporter $excel )
    {
        $this->middleware('auth');
        $this->dbCommon = new DbCommon();
        $this->holderName = 'MISSUM2019';
        $this->userId = 224;
        $this->excel = $excel;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */    
    public function index(request $request)
    {            
        $passData = $this
            ->dbCommon
            ->numberDisplay(
                $this->holderName, 
                $this->userId
            );  
        return view('home')->with($passData);
    }

    public function export(request $request)   
     {
        $from=$request->from;
        $to=$request->to;

            if($from=='variable does not exist')
            {
                return Excel::download(
                            new VotingExport, 'voting_result.xlsx');  
            }

            else
            {
                


             return Excel::download(
                            new VotingExportSearch($request), 'voting_result_by_date.xlsx'); 

             // return (new VotingExportSearch($request))->download('voting_result_by_date.xlsx');

#
            }









  


            

      }
    

    /**
     * Show the application dashboard by date range.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */ 
    public function search(Request $request)
    {
        $from=$request->from;
        $to=$request->to;
        session()->put(['from'=> $from,'to' => $to]);   

        $passData = $this
            ->dbCommon
            ->numberDisplayByDateRange(
                $request, 
                $this->holderName, 
                $this->userId
            );  

        return view('home',compact('from','to'))->with($passData);

    }
     public function detail_search(Request $request)
    {
       $from=$request->from;
        $to=$request->to;

        session()->put(['from'=> $from,'to' => $to]);
        
        $passData = $this
            ->dbCommon
            ->numberDisplayByDateRange(
                $request, 
                $this->holderName, 
                $this->userId
            );  

        return view('detail',compact('from','to'))->with($passData);
    }

     public function detail()
    {
       $passData = $this
            ->dbCommon
            ->numberDisplay(
                $this->holderName, 
                $this->userId
            );  

        return view('detail')->with($passData);
    }

    public function smsin()
    {
       
         $sms_ins = DB::connection('mptsdp')
            ->table('tbl_vote')
            ->select('callerid','keyword','timestamp')
            ->where('holdername', 'MISSUM2019')->get();

         return view('sms_in')->with('sms_ins',$sms_ins);

    }

    

    
}
