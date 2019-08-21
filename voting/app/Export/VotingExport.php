<?php
namespace Voting\Export;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use DB;

class VotingExport implements FromCollection,WithHeadings
{
    public function collection()
    {
       $data = DB::connection('mptsdp')
            ->table('tbl_vote')
            ->select(DB::raw('count(*) as voting_count, keyword'))
            ->where('holdername', 'MISSUM2019')
            ->groupBy('keyword')
            ->get();
       $data = $data->sortBy('keyword', SORT_NATURAL);
      return $data;
    }
     public function headings(): array
    {
        return [
            'Count',
            'Keyword',
            
        ];
    }


}