<?php
include'includes/config.php';
$obj=new Student();
$res=$obj->studentNamelistFromDataList();
$obj1=new Reference();
// print_r($res);
?> 
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

<table class="table table-bordered tablesorter table_filter" id='simpleTable1'>
	<thead>
		<tr>
			<th>S.No</th>
<th>AT Register No</th>
<th>Student Name</th>
<th>Father Name</th>
<th>Address</th>
<th>Pincode</th>
<th>City</th>
<th>District</th>
<th>+2 Group</th>
<th>+2 Register No</th>
<th>Community</th>
<th>Mobile No</th>
<th>Whatsapp No</th>
<th>Email ID</th>
<th>Preperence</th>
<th>Date of Birth</th>
<th>School Name</th>
<th>Place</th>
<th>Taluk</th>
<th>District</th>
<th>Refered By</th>
<th>College</th>
<th>Date of Registration</th>
		</tr>
	</thead>
	<tbody>
		<?php
		$i=0;
		foreach ($res as $row) {
			$i=$i+1;
			$refer=$obj1->getReferenceDetails($row['regno']);
			echo "<tr><td>$i</td><td>".$row['at_regno']."</td><td>".$row['name']."</td><td>".$row['fathername']."</td><td>".$row['add1']."</td><td>".$row['add2']."</td><td>".$row['city']."</td><td>".$row['district']."</td><td>".$row['branch']."</td><td>".$row['regno']."</td><td>".$row['community']."</td><td>".$row['cno1']."</td><td>".$row['cno2']."</td><td>".$row['email']."</td><td>".$row['preperence']."</td><td>".date('d-M-Y',strtotime($row['dob']))."</td><td>".$row['s_name']."</td><td>".$row['place']."</td><td>".$row['school_tk']."</td><td>".$row['school_dt']."</td>";
			if($refer['ref']!=""&&$refer['ref']!="-"&&$refer['ref']!="Nil"){
				echo "<td>".$refer['ref']." ".$refer['refmobile']." ".$refer['dept']."</td><td>".$refer['college']."</td>";
			}else{
				echo "<td colspan=2>Direct
				</td>";
			}
        	echo "<td>".date("d-M-Y",strtotime($row['dor']))."</td>";
		}

		?>
	</tbody>
	<button type="button" onclick="tableToCSV()">
            download CSV
        </button>
</table>
    <script type="text/javascript">
        function tableToCSV() {
 
            // Variable to store the final csv data
            var csv_data = [];
 
            // Get each row data
            var rows = document.getElementsByTagName('tr');
            for (var i = 0; i < rows.length; i++) {
 
                // Get each column data
                var cols = rows[i].querySelectorAll('td,th');
 
                // Stores each csv row data
                var csvrow = [];
                for (var j = 0; j < cols.length; j++) {
 
                    // Get the text data of each cell
                    // of a row and push it to csvrow
                    csvrow.push(cols[j].innerHTML);
                }
 
                // Combine each column value with comma
                csv_data.push(csvrow.join(","));
            }
 
            // Combine each row data with new line character
            csv_data = csv_data.join('\n');
 
            // Call this function to download csv file 
            downloadCSVFile(csv_data);
 
        }
 
        function downloadCSVFile(csv_data) {
 
            // Create CSV file object and feed
            // our csv_data into it
            CSVFile = new Blob([csv_data], {
                type: "text/csv"
            });
 
            // Create to temporary link to initiate
            // download process
            var temp_link = document.createElement('a');
 
            // Download csv file
            temp_link.download = "StudentNameList.csv";
            var url = window.URL.createObjectURL(CSVFile);
            temp_link.href = url;
 
            // This link should not be displayed
            temp_link.style.display = "none";
            document.body.appendChild(temp_link);
 
            // Automatically click the link to
            // trigger download
            temp_link.click();
            document.body.removeChild(temp_link);
        }
    </script>
</body>
 
</html>

  