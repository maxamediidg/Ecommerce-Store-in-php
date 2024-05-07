<?php require "../includes/header.php"; ?>
<?php require "../config/config.php"; ?>



<div class="col-lg-12 stretch-card">
  <div class="card">
    <div class="card-body">
      <br />
      <br />
      <br />
      <br />
      <br />
      <br />
      <h4 class="card-title">Payment Transaction</h4>
      <p class="card-description"> Add class <code>.table-{color}</code>
      </p>
      <div class="table-responsive">
        <table class="table table-bordered table-contextual">
          <thead  class="bg-info text-white">
            <tr>
              <th> # </th>
              <th> Username </th>
              <th> Number by Credit Card </th>
              <th> Amount </th>
              <th> Date Modify </th>
            </tr>
          </thead>
          <tbody>
          <?php

$select = $conn->prepare("select * from payments order by id ASC");
$select->execute();

while ($row = $select->fetch(PDO::FETCH_OBJ)) {
  echo '
<tr>
<td> ' . $row->id . '</td>
<td> ' . $row->username . '</td>
<td> ' . $row->card_number . '</td>
<td> ' . $row->price . '</td>
<td> ' . $row->timestamp . '</td>

</tr>';
}

?>

          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
</div>
</div>
 
<div class="col-lg-12 stretch-card">
  <div class="card">
    <div class="card-body">
      <br />
      <br />
      <br />
      <br />
      <br />
      <br />
      <h4 class="card-title">order Transaction </h4>
      <p class="card-description"> Add class <code>.table-{color}</code>
      </p>
      <div class="table-responsive">
        <table class="table table-bordered table-contextual">
          <thead>
            <tr class="table-danger">
              <th> # ID </th>
              <th> First name </th>
              <th> last Name </th>
              <th> email </th>
              <th> country </th>
              <th> city </th>
              <th> address </th>
              <th> phone_number </th>
              <th> Date Created at </th>
              <th> price  </th>
            </tr>
          </thead>
          <tbody>
          <?php

$select = $conn->prepare("select * from orders order by id ASC");
$select->execute();

while ($row = $select->fetch(PDO::FETCH_OBJ)) {
  echo '
<tr>
<td> ' . $row->id . '</td>
<td> ' . $row->name . '</td>
<td> ' . $row->lname . '</td>
<td> ' . $row->email . '</td>
<td> ' . $row->country . '</td>
<td> ' . $row->city . '</td>
<td> ' . $row->address . '</td>
<td> ' . $row->phone_number . '</td>
<td> ' . $row->price . '</td>
<td> ' . $row->created_at . '</td>

</tr>';
}

?>

          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
</div>
</div>

      <footer class="footer">
        <div class="container-fluid clearfix">
          <span class="text-muted d-block text-center text-sm-left d-sm-inline-block">Copyright © 2018
            <a href="http://www.bootstrapdash.com/" target="_blank">Bootstrapdash</a>. All rights reserved.</span>
          <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Hand-crafted & made with
            <i class="mdi mdi-heart text-danger"></i>
          </span>
        </div>
      </footer>
    </div>