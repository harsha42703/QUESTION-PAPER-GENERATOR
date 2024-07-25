
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<style>
    .container{
        padding:30px;
        padding-top: 30px;

        width:100%;
        height: 100vh;
        overflow-y: scroll;
        
    }
    .container::-webkit-scrollbar {
    display: none;
}

    th,tr{
        text-align: center;
    }

    table{
        border:solid 1px black;
    }

    a{
      color:black;
    }
    .head{
    width: 100%;
    height: 50px;
   
    display: flex;
    align-items: center;
    justify-content: center;
    margin-bottom:20px;
  }

  .head h2{
    color: rgba(0, 0, 0, 0.867);
  }
</style>
<div class="container">
<div class="head"><h2>BRANCHES</h2></div>
<table class="table">
  <thead>
    <tr>
      <th scope="col">S.NO</th>
      <th scope="col">Branch</th>
      <th scope="col">Branch Code</th>
      <th scope="col">Subjects Count</th>
      <th scope="col">Edit</th>
    </tr>
  </thead>
  <tbody>
<?php 
include('includes/db.php');
$show_branches = "SELECT * FROM BRANCHES ";
$branches_exe = mysqli_query($con,$show_branches);
$s_no=1;
while($row=mysqli_fetch_assoc($branches_exe))
{
    echo " <tr>
    <th scope='row'>{$s_no}</th>
    <td>{$row['branch_name']}</td>
    <td>{$row['branch_code']}</td>
    <td>49</td>
    <td><a href='index.php?editbranch={$row['branch_id']}'><i class='fas fa-edit'></i></a></td>
  </tr>";

  $s_no++;
}

?>
    
   
    
  </tbody>
</table>
</div>


