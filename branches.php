<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<style>




    .row{
        padding-left:10px;
        padding-right:10px;
        padding-top:15px;

    }
    body{
        overflow-x:hidden;
    }

    .card-body{
        
        box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;
    }

    .card-body p{
        font-size: 23px;
    }

    .tt{
        color:white;
        font-size:16px;
    }

    .row1{
        width: 100%;
        display:flex;
        align-items: center;
        justify-content: space-around;
        margin-bottom: 30px;
        margin-top:10px;
        column-gap: 10%;

    }

    .row1 a{
        /* margin-left: 10%; */
        text-decoration: none;
        color: black;
    }
   </style>
  

    <div class="row">
    <div class="row1">
    <a href="index.php?addbranch">Add  Branch</a>
    <a href="index.php?editbranches">Edit Branches</a>
   
  </div>
                        <!-- Content Column -->
                        <div class="col-lg-12 mb-4">

                            <!-- Project Card Example -->
                            

                            <!-- Color System -->
                            <div class="row">
                                <div class="col-lg-12 mb-4">
                                    <div class="card bg-primary text-white shadow">
                                        <div class="card-body">
                                           <p id="branch-name">CSE</p> 
                                            <div class="text-white-50 small tt">Subjects : 49</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-12 mb-4">
                                    <div class="card bg-success text-white shadow">
                                        <div class="card-body">
                                        <p id="branch-name">AIML</p>
                                            <div class="text-white-50 small tt">Subjects : 47</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-12 mb-4">
                                    <div class="card bg-info text-white shadow">
                                        <div class="card-body">
                                        <p id="branch-name">AIDS</p>
                                            <div class="text-white-50 small tt">Subjects : 45</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-12 mb-4">
                                    <div class="card bg-warning text-white shadow">
                                        <div class="card-body">
                                        <p id="branch-name">IT</p>
                                            <div class="text-white-50 small tt">Subjects : 43</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-12 mb-4">
                                    <div class="card bg-danger text-white shadow">
                                        <div class="card-body">
                                        <p id="branch-name">MECH</p>
                                            <div class="text-white-50 small tt">Subjects : 49</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-12 mb-4">
                                    <div class="card bg-secondary text-white shadow">
                                        <div class="card-body">
                                        <p id="branch-name">CIVIL</p>
                                            <div class="text-white-50 small tt">Subjects : 48</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-12 mb-4">
                                    <div class="card bg-light text-black shadow">
                                        <div class="card-body">
                                        <p id="branch-name">ECE</p>
                                            <div class="text-black-50 small tt">Subjects : 47</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-12 mb-4">
                                    <div class="card bg-dark text-white shadow">
                                        <div class="card-body">
                                        <p id="branch-name">EEE</p>
                                            <div class="text-white-50 small tt">Subjects : 45</div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>

                        
                    </div>
   
</body>
</html>