<?php
require('conn.php');
$s=new DBCON();
$link=$s->linkarivu();
include('top.php');
?>
<div class='headmenu'>Branch Wise Report</div>
<form action='report1.php' method='post'>
    <div class='container'>
        <div class='road row'>
            <div class='col-lg-2'></div>
            <div class='col-lg-3'>Branch</div>
            <div class='col-lg-5'>
               <select name='2g' id='2g' class="form-control">
					<option value="">Select Group</option>
					<option value="MPCC">Mathematics, Physics, Chemistry, Computer Science</option>
					<option value="MPCB">Mathematics, Physics, Chemistry, Biology</option>
					<option value="PCBC">Physics, Chemistry, Biology, Computer Science</option>
					<option value="PCZB">Physics, Chemistry,Zoology, Botany</option>
					<option value="CACE">Accountancy, Commerce, Economics, Computer Science</option>
					<option value="VO/OT">Vocational / Others</option>
					
					
				</select>	
            </div>
            <div class='col-lg-2'></div>
        </div>
        <div class='road row'>
            <div class='col-lg-2'></div>
            <div class='col-lg-3'>Range of Mark</div>
            <div class='col-lg-5'>
               <select name='cat' id='cat' class="form-control">
					<option value="">Select Range of Mark</option>
					<option value="50">0-50</option>
					<option value="74">51-74</option>
					<option value="90">75-90</option>
					<option value="94">91-94</option>
					<option value="95">95 and Above</option>
					
				</select>	
            </div>
            <div class='col-lg-2'></div>
        </div>
        <div class='road row'>
            <div class='col-lg-12 text-center'>
                <input type='submit' name='save' value='Go' class='btn btn-info'>
            </div>
        </div>
    </div>
    </form>
