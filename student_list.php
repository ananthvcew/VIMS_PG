<?php
include'includes/config.php';
$obj=new Student();
$res=$obj->studentNamelistFromDataList();
$obj1=new Reference();
// print_r($res);
?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<link rel="stylesheet" href="theme.bootstrap_4.css">
<link rel="stylesheet" href="jquery.tablesorter.pager.css">
  <style>
  .tablesorter-pager .btn-group-sm .btn {
    font-size: 1.2em;
  }
  </style>
  <table class="table">
                         <tr>
            <th class="ts-pager">
                <div class="form-inline">
                    <div class="btn-group btn-group-sm mx-1" role="group">
                        <button type="button" class="btn first" title="first"><i class="fa fa-backward" aria-hidden="true"></i></button>
                        <button type="button" class="btn prev" title="previous"><i class="fa fa-caret-left fa-lg" aria-hidden="true"></i></button>
                    </div>
                    <label class="pagedisplay"></label>
                    <div class="btn-group btn-group-sm mx-1" role="group">
                        <button type="button" class="btn  next" title="next"><i class="fa fa-caret-right fa-lg" aria-hidden="true"></i></button>
                        <button type="button" class="btn  last" title="last"><i class="fa fa-forward" aria-hidden="true"></i></button>
                    </div>
                    <select class="form-control-sm custom-select pagesize" title="Select page size">
                        <option selected="selected" value="10">10</option>
                        <option value="20">20</option>
                        <option value="30">30</option>
                        <option value="all">All Rows</option>
                    </select>
                           
                </div>
            </th>
            <th><a href='studentList1.php'  target='_blank' class="btn btn-info">Download</a> </th>
        </tr>
                    </table>
<table class="table table-bordered tablesorter table_filter" id='example'>
	<thead>
		<tr>
			<th>S.No</th><th>Student Name</th><th>District</th><th>Refered By</th><th>College</th>
		</tr>
	</thead>
	<tbody>
		<?php
		$i=0;
		foreach ($res as $row) {
			$i=$i+1;
			$refer=$obj1->getReferenceDetails($row['regno']);
			echo "<tr><td>$i</td><td>".$row['name']."</td><td>".$row['district']."</td>";
			if($refer['ref']!=""&&$refer['ref']!="-"&&$refer['ref']!="Nil"){
				echo "<td>".$refer['ref']." ".$refer['refmobile']." ".$refer['dept']."</td><td>".$refer['college']."</td>";
			}else{
				echo "<td colspan=2><b>Direct</b>
				</td>";
			}
		}

		?>
	</tbody>
	
</table>
        
    
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js" integrity="sha512-STof4xm1wgkfm7heWqFJVn58Hm3EtS31XFaagaa8VMReCXAkQnJZ+jEy8PCC/iT18dFy95WcExNHFTqLyp72eQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>     
       
        <script src="jquery.tablesorter.js"></script>
  <script src="jquery.tablesorter.widgets.js"></script>
<script src="jquery.tablesorter.pager.js"></script>

            <script>$(function() {
            	$("table").tablesorter({
       theme : "bootstrap",

        widthFixed: true,

        // widget code contained in the jquery.tablesorter.widgets.js file
        // use the zebra stripe widget if you plan on hiding any rows (filter widget)
        // the uitheme widget is NOT REQUIRED!
        widgets : [ "filter"],
        headers: {
        7: { sorter: false, filter: false },
        //6: { sorter: false, filter: false },
        //5: { sorter: false, filter: false },
        8: { sorter: false, filter: false },
        9: { sorter: false, filter: false },
        //3: { sorter: false, filter: false },
        10: { sorter: false, filter: false },
        11: { sorter: false, filter: false }
        },
        widgetOptions : {
            // using the default zebra striping class name, so it actually isn't included in the theme variable above
            // this is ONLY needed for bootstrap theming if you are using the filter widget, because rows are hidden
            zebra : ["even", "odd"],

            // class names added to columns when sorted
            // columns: [ "primary", "secondary", "tertiary" ],

            // reset filters button
            filter_reset : ".reset",

            // extra css class name (string or array) added to the filter element (input or select)+
            filter_cssFilter: [
                'form-control',
                'form-control',
                'form-control', // select needs custom class names :(
                'form-control',
                'form-control',
                'form-control',
                'form-control',
                'form-control',
                'form-control',
                'form-control'

            ]

        }


    })
    .tablesorterPager({

        // target the pager markup - see the HTML block below
        container: $(".ts-pager"),

        // target the pager page select dropdown - choose a page
        cssGoto  : ".pagenum",

        // remove rows from the table to speed up the sort of large tables.
        // setting this to false, only hides the non-visible rows; needed if you plan to add/remove rows with the pager enabled.
        removeRows: false,

        // output string - default is '{page}/{totalPages}';
        // possible variables: {page}, {totalPages}, {filteredPages}, {startRow}, {endRow}, {filteredRows} and {totalRows}
        output: '{startRow} to {endRow} of {filteredRows} ({totalRows})'

    });
});

            </script>


  