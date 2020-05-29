<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <script src="js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <style type="text/css">
        .bs-example {
            margin: 20px;
        }

        .navbar {
            margin-bottom: 1rem;
        }

        tbody {
      display:block;
      max-height:450px;
      overflow-y:auto;
  }
  thead, tbody tr {
      display:table;
      width:100%;
      table-layout:fixed;
  }
  thead {
      width: calc( 100% - 1em )
  } 


  </style>

    <title><?php echo $pg_title; ?></title>
</head>

<body>

    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
            <a class="navbar-brand" href="#">Admin</a>
            <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item ">
                        <a class="nav-link <?php if ($pg == 'all_user') {
                                                echo 'active';
                                            } ?>" href="all_user.php">All User </a>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link <?php if ($pg == 'add_user') {
                                                echo 'active';
                                            } ?>" href="add_user.php">Add User</a>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link <?php if ($pg == 'stock') {
                                                echo 'active';
                                            } ?>" href="stock.php">Stock</a>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link <?php if ($pg == 'add_item') {
                                                echo 'active';
                                            } ?>" href="add_item.php">Add Item</a>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link <?php if ($pg == 'add_category') {
                                                echo 'active';
                                            } ?>" href="add_category.php">Add Category</a>
                    </li>
                </ul>
                <span style="color: white;margin-right: 5px" class="my-2 my-sm-0">HELLO</span>
                <span style="color: yellow;margin-right: 5px" class="my-2 my-sm-0">
                    <?php
                    echo strtoupper($_SESSION['name']);
                    ?> </span>
                <a href="logout.php"><button style="margin-left: 5px" class="btn btn-danger  my-2 my-sm-0">Logout</button></a>
            </div>
        </nav>