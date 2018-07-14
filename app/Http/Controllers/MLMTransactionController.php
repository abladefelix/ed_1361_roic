<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class MLMTransactionController extends Controller
{
	/*// fetch paginated Transactions
	public function getPaginatedTransactions1()
	{
		$transactions = DB::table('transactions')->paginate(3);
        $response = [
            'pagination' => [
                'total' => $transactions->total(),
                'per_page' => $transactions->perPage(),
                'current_page' => $transactions->currentPage(),
                'last_page' => $transactions->lastPage(),
                'from' => $transactions->firstItem(),
                'to' => $transactions->lastItem()
            ],
            'data' => $transactions
        ];
        //return response()->json($response);
        return json_encode($response);
	}*/

	// default method to fetch paginated data
	// ie. when there is no Transaction being search
	// fetch paginated Transactions using selected page no and rows to display per page
	public function getPaginatedTransactions($selectedPageNo, $rowsPerPage)
	{
		// count all Transactions
		$transactionsCount = self::countAllTransactions("");

		// Expected Number of Rows per Page
		//$rowsPerPage = 3;

		// Identify the number of Pages that will be displayed
		$numberOfPages = $transactionsCount / $rowsPerPage; // Divide total number of records/Transactions by expected number of rowsPerPage
		$numberOfPages = ceil($numberOfPages); // ceil Function for exact number of Pages to be displayed

		// If its another page apart from page 1, set Limit & Offset to be used in SQL Query
		if ($selectedPageNo != 1)
		{
			$offset = $rowsPerPage * $selectedPageNo - $rowsPerPage; // multiply rowsPerPage by selectedPageNo - rowsPerPage to determine offset
			$limit = $rowsPerPage;
			
			// Limit and Offset SQL Query
			$limitSQL = " LIMIT " . $limit . " OFFSET " . $offset;

			// number of entries info showed array
	    	$noOfEntriesInfo = self::getNumberOfEntriesInfo($selectedPageNo, $rowsPerPage, $transactionsCount, $offset, $limit);
		}
		else
		{
			$limit = $rowsPerPage; // limit set to initial value from rowsPerPage
			$offset = 0; // offset

			// Limit and Offset SQL Query
			$limitSQL = " LIMIT " . $rowsPerPage;

			// number of entries info showed array
	    	$noOfEntriesInfo = $this->getNumberOfEntriesInfo($selectedPageNo, $rowsPerPage, $transactionsCount, $offset, $limit);
		}

		$paginatedTransactions = DB::select('select * from transactions ' . $limitSQL);
    	//return json_encode($paginatedTransactions);

    	// pagination array
    	$pagination = [
    		'pagination' => [
                'total' => $numberOfPages,
                'per_page' => $rowsPerPage,
                'current_page' => $selectedPageNo,
                'last_page' => $numberOfPages,
                'from' => 1,
                'to' => $numberOfPages,
                'next_page' => $selectedPageNo + 1,
                'previous_page' => $selectedPageNo - 1
            ]
    	];

    	return json_encode(array_merge($paginatedTransactions, $pagination, $noOfEntriesInfo));
	}

	// to be used when there is a Transaction being searched for
	// fetch paginated Transactions using selected page no, rows to display per page, item or input to search
	public function getPaginatedTransactionsSearch($selectedPageNo, $rowsPerPage, $searchInput)
	{
		// count all Transactions
		$transactionsCount = self::countAllTransactions($searchInput);

		// Expected Number of Rows per Page
		//$rowsPerPage = 3;

		// Identify the number of Pages that will be displayed
		$numberOfPages = $transactionsCount / $rowsPerPage; // Divide total number of records/Transactions by expected number of rowsPerPage
		$numberOfPages = ceil($numberOfPages); // ceil Function for exact number of Pages to be displayed

		// If its another page apart from page 1, set Limit & Offset to be used in SQL Query
		if ($selectedPageNo != 1)
		{
			$offset = $rowsPerPage * $selectedPageNo - $rowsPerPage; // multiply rowsPerPage by selectedPageNo - rowsPerPage to determine offset
			$limit = $rowsPerPage;
			
			// Limit and Offset SQL Query
			$limitSQL = " LIMIT " . $limit . " OFFSET " . $offset;

			// number of entries info showed array
	    	$noOfEntriesInfo = self::getNumberOfEntriesInfo($selectedPageNo, $rowsPerPage, $transactionsCount, $offset, $limit);
		}
		else
		{
			$limit = $rowsPerPage; // limit set to initial value from rowsPerPage
			$offset = 0; // offset

			// Limit and Offset SQL Query
			$limitSQL = " LIMIT " . $rowsPerPage;

			// number of entries info showed array
	    	$noOfEntriesInfo = self::getNumberOfEntriesInfo($selectedPageNo, $rowsPerPage, $transactionsCount, $offset, $limit);		
		}

		// part of SQL Query with where clause for searchInput
		$whereSQL = "where id like '" . $searchInput . "%' or transaction_number like '" . $searchInput . "%'"; 

		$paginatedTransactions = DB::select('select * from transactions ' . $whereSQL . " " . $limitSQL);
    	//return json_encode($paginatedTransactions);

    	// pagination array
    	$pagination = [
    		'pagination' => [
                'total' => $numberOfPages,
                'per_page' => $rowsPerPage,
                'current_page' => $selectedPageNo,
                'last_page' => $numberOfPages,
                'from' => 1,
                'to' => $numberOfPages,
                'next_page' => $selectedPageNo + 1,
                'previous_page' => $selectedPageNo - 1
            ]
    	];

    	return json_encode(array_merge($paginatedTransactions, $pagination, $noOfEntriesInfo));
	}

    // get all Transactions
    public function getAllTransactions()
  	{
	    $getAllTransactions = DB::table('transactions')->get();
    	return json_encode($getAllTransactions);
  	}

  	// count all transactions depending on searchInput
  	function countAllTransactions($searchInput)
  	{
	    $totalTransactions = count(DB::select("select * from transactions where id like '" . $searchInput . "%'"));
    	//return json_encode($totalTransactions);
    	return $totalTransactions;
  	}

  	// information about entries being displayed below transactions
  	function getNumberOfEntriesInfo($selectedPageNo, $rowsPerPage, $transactionsCount, $offset, $limit)
  	{
  		// If its another page apart from page 1
  		if ($selectedPageNo != 1)
  		{
  			// get exact value of the last record's position in the range -- (to)
	  		// making sure the addition of the offset and limit do not exceed the transactionsCount
	  		if ( ($offset + $limit) > $transactionsCount )
	  			$to = $transactionsCount; // assign value of transactionsCount
	  		else
	  			$to = $offset + $limit;

  			// number of entries info array
	    	$noOfEntriesInfo = [
	    		'no_of_entries_info' => [
	                'out_of' => $transactionsCount, // total entries
	                'from' => $offset + 1, // from
	                'to' => $to // to
	            ]
	    	];
  		}
  		else
  		{
  			// get exact value of the last record's position in the range -- (to)
	  		// making sure the addition of the offset and limit do not exceed the transactionsCount
	  		if ( ($offset + $limit) > $transactionsCount )
	  			$to = $transactionsCount; // assign value of transactionsCount
	  		else
	  			$to = $offset + $limit;

	  		// doing same for -- (from)
	  		if ( ($offset + 1) > $transactionsCount )
	  			$from = $transactionsCount;
	  		else
	  			$from = $offset + 1;

  			// number of entries info array
	    	$noOfEntriesInfo = [
	    		'no_of_entries_info' => [
	                'out_of' => $transactionsCount, // total entries
	                'from' => $from, // from
	                'to' => $to // to
	            ]
	    	];
  		}

  		return $noOfEntriesInfo;
  	}

  	// get Transactions
    public function getTransactions()
  	{
	    $transactions = DB::table('transactions')->get();
    	return json_encode($transactions);
  	}

}
