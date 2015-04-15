
<?php
require('../../config.php');
//ini_set('memory_limit', '512M');
//project hours completed last week
if(isset($_GET['company'])){

$company = $_GET['company'];
$company = urldecode($company);
$results = mssql_query('SELECT top 1 company_address.address_line1,company_address.address_line1,company_address.city,company_address.state_id,company_address.zip,company_address.phonenbr
FROM  company_address left outer join company on company_address.company_recid = company.company_recid



WHERE dbo.company.company_name = "'.$company.'"'

 );
}



while($row = mssql_fetch_array($results)) {



    echo "<p>".$row['address_line1']."<br />";
    if($row['address_line2']  =null){
      echo "<p>".$row['address_line2']."<br />";
    }

    echo "<p>".$row['city'].", ".$row['state_id']."<br />";

    echo "<p>".$row['zip']."<br />";
    echo "<p>".$row['phonenbr']."</p>";



}




?>
