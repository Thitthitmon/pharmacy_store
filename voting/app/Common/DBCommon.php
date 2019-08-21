<?php

namespace Voting\Common;
/**
 * To be used different common query funtion by other class
 * 
 * @author  Htoo Maung Thait (htoomaungthait@gmail.com), peter
 * 
 * @since '2019-04-28'
 */

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class DBCommon 
{
	
	public function __construct()
	{
		# code...
	}

	/**
	* To search required voting statistical data
	* @param string $holdername
	* @param int $userId
	* 
	* @return array $data
	**/
	public function numberDisplay($holderName, $userId){
        $total_revenue = DB::connection('mptsdp')
            ->table('tbl_vote')
            ->select(DB::raw('SUM(amount) as total'))
            ->where('holdername', $holderName)
            ->first();

        $total_sms_out = DB::connection('smslog')
        ->table('sms_log')
        ->select(DB::raw('count(*) as total'))
        ->where('keyword', 'like' , '%MUM%')
        ->first();
        
        $total_sms = DB::connection('mptsdp')
            ->table('tbl_vote')
            ->select(DB::raw('count(*) as total'))
            ->where('holdername', $holderName)
            ->first();       

        $totalCompetitor = $this->totalCompetitor($userId);

        $remainCompetitor = $this->remainCompetitor($userId);

        $missVotings = DB::connection('mptsdp')
            ->table('tbl_vote')
            ->select(DB::raw('count(*) as voting_count, keyword'))
            ->where('holdername', $holderName)
            ->groupBy('keyword')
            ->get();
        $missVotings = $missVotings->sortBy('keyword', SORT_NATURAL);


        $data = [
            "total" => $total_revenue,
            "total_sms" => $total_sms,
            "total_sms_out" => $total_sms_out,
            "totalCompetitor" => $totalCompetitor,
            "remainCompetitor" => $remainCompetitor,
            "missVotings" => $missVotings
        ];

        return $data;

    }

    /**
	* To search required voting statistical data by date range
	* 
	* @param Request $request
	* @param string $holdername
	* @param int $userId
	* 
	* @return array $data
	**/
    public function numberDisplayByDateRange(Request $request, $holderName, $userId){
        $dateFrom = $request->input('from').' 00:00:00';
        $dateTo = $request->input('to').' 23:59:59';  


        $total_revenue = DB::connection('mptsdp')
            ->table('tbl_vote')
            ->select(DB::raw('SUM(amount) as total'))
            ->where('holdername', $holderName)
            ->whereBetween('timestamp', [$dateFrom, $dateTo])
            ->first();
        
        $total_sms = DB::connection('mptsdp')
            ->table('tbl_vote')
            ->select(DB::raw('count(*) as total'))
            ->where('holdername', $holderName)
            ->whereBetween('timestamp', [$dateFrom, $dateTo])
            ->first();  

        $total_sms_out = DB::connection('smslog')
        ->table('sms_log')
        ->select(DB::raw('count(*) as total'))
        ->where('keyword', 'like' , '%MUM%')
        ->whereBetween('request_time', [$dateFrom, $dateTo])
        ->first();     

        $totalCompetitor = $this->totalCompetitor($userId);

        $remainCompetitor = $this->remainCompetitor($userId);

        $missVotings = DB::connection('mptsdp')
            ->table('tbl_vote')
            ->select(DB::raw('count(*) as voting_count, keyword'))            
            ->whereBetween('timestamp', [$dateFrom, $dateTo])
            ->Where('holdername', $holderName)            
            ->groupBy('keyword')
            ->get();
        $missVotings = $missVotings->sortBy('keyword', SORT_NATURAL);


        $data = [
            "total" => $total_revenue,
            "total_sms" => $total_sms,
            "total_sms_out" => $total_sms_out,
            "totalCompetitor" => $totalCompetitor,
            "remainCompetitor" => $remainCompetitor,
            'missVotings' => $missVotings
        ];

        return $data;        
    }

    /**
     * To search remaining competitor in voting at given user Id
     * @param  int $userId [user Id register at tbl_keyword]
     * @return Collection  $data 
     */
    private function remainCompetitor($userId)
    {
    	$data = DB::connection('mptsdp')
            ->table('tbl_keyword')
            ->select(DB::raw('count(id) as count'))
            ->where('userid', $userId)
            ->where('Active', 1)
            ->first();
        return $data;
    }

	/**
     * To search total competitor in voting at given user Id
     * @param  int $userId [user Id register at tbl_keyword]
     * @return Collection  $data
     */
    private function totalCompetitor($userId){
    	$data = DB::connection('mptsdp')
            ->table('tbl_keyword')
            ->select(DB::raw('count(id) as count'))
            ->where('userid', $userId)            
            ->first();
        return $data;	
    }
}