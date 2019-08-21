<?php
namespace Voting\Export;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Illuminate\Http\Request;

use Maatwebsite\Excel\Facades\Excel as MaatExcel;
use DB;

class VotingExportSearch implements FromCollection,WithHeadings
{

    private $from ;
    private $to ;

    public function __construct(Request $request)
    { 
        $this->from=$request->from ;
        $this->to=$request->to  ;
    }

    //  public function query()
    // {
    //   $from=$this->from;
    //   $to=$this->to;
    //   $dateFrom = $from.' 00:00:00';
    //   $dateTo = $to.' 23:59:59';   

    //      $missVotings = DB::connection('mptsdp')
    //         ->table('tbl_vote')
    //         ->select(DB::raw('count(*) as voting_count, keyword'))            
    //         ->whereBetween('timestamp', [$dateFrom, $dateTo])
    //         ->Where('holdername', 'MISSUM2019')            
    //         ->groupBy('keyword')
    //         ->get();
    //     $missVotings = $missVotings->sortBy('keyword', SORT_NATURAL);


    // }

    public function collection()
    {
     
      $from=$this->from;
      $to=$this->to;
      $dateFrom = $from.' 00:00:00';
      $dateTo = $to.' 23:59:59';   

         $missVotings = DB::connection('mptsdp')
            ->table('tbl_vote')
            ->select(DB::raw('count(*) as voting_count, keyword'))            
            ->whereBetween('timestamp', [$dateFrom, $dateTo])
            ->Where('holdername', 'MISSUM2019')            
            ->groupBy('keyword')
            ->get();
        $missVotings = $missVotings->sortBy('keyword', SORT_NATURAL);
        return $missVotings;
    }

     public function headings(): array
    {
        return [
            'Count',
            'Keyword',
            
            
        ];
    }


}