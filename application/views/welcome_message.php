<!DOCTYPE html>
<html lang="en">
<head>
  <title>Participant | Eduvanz</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.22/css/dataTables.bootstrap4.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.10.22/js/dataTables.bootstrap4.min.js"></script>
</head>
<body>

<div class="container">
  <h2 class="mb-4 mt-4">Participants List</h2>          
  <table class="table table-bordered" id="example">
    <thead>
      <tr>
        <th>ID</th>
        <th>Firstname</th>
        <th>Lastname</th>
        <th>Age</th>
        <th>DOB</th>
        <th>Address</th>
        <th>Locality</th>
        <th>Profession</th>
      </tr>
    </thead>
    <tbody></tbody>
  </table>
</div>

<script type="text/javascript">

var table = $('#example').DataTable({
    "order": [[ 0, "desc" ]],
        "ajax": '<?php echo base_url() ?>api/participants',
         "columns" : [ {
            "data" : "p_id"
        },{
            "data" : "p_fname"
        },{
            "data" : "p_lname"
          },{
            "data" : "p_age"
          },{
            "data" : "p_dob"
          },{
            "data" : "p_address"
          },{
            "data" : "p_locality"
          },{
            "data" : "p_profession"
          }
        ],
});

</script>

</body>
</html>
