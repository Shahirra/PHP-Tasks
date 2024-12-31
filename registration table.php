<?php
define("Name", "<h1>Application name : PHP Class Registration </h1>");
echo (Name) ;
$students = [
    ['name' => 'Alaa', 'email' => 'ahmed@test.com', 'status' => 'CMS'],
    ['name' => 'Shamy', 'email' => 'ali@test.com', 'status' => 'OS'],
    ['name' => 'Youssef', 'email' => 'basem@test.com', 'status' => 'OS'],
    ['name' => 'Waleid', 'email' => 'farouk@test.com', 'status' => 'CMS'],
    ['name' => 'Rahma', 'email' => 'hany@test.com', 'status' => 'OS'],
    
];
// print_r( $students[0]['name']); 


// echo "<table>";
//   echo "<tr>";
//   echo "<th>Name </th> <th>Email</th> <th>Status</th>";
//   echo "</tr>";
// for ($row = 0; $row < 5; $row++) {
        // echo "<tr>";
//   for ($col = 0; $col <tr 3; $col++) {
//     echo "<td>".$students[$row][$col]."</td>";
//   }
      // echo "</tr>";
// }
// echo "</table>";


?>

<html>
    <table >
  <tr>
    <th>Name </th>
    <th>Email</th>
    <th>Status</th>
  </tr>
  <tr style = "color: red ">
    <td><?php print_r( $students[0]['name']); ?></td>
    <td><?php print_r( $students[0]['email']); ?></td>
    <td><?php print_r( $students[0]['status']); ?></td>
  </tr>
  <tr>
    <td><?php print_r( $students[1]['name']); ?></td>
    <td><?php print_r( $students[1]['email']); ?></td>
    <td><?php print_r( $students[1]['status']); ?></td>
  </tr>
 <tr>
    <td><?php print_r( $students[2]['name']); ?></td>
    <td><?php print_r( $students[2]['email']); ?></td>
    <td><?php print_r( $students[2]['status']); ?></td>
  </tr>
  <tr style = "color: red ">
    <td><?php print_r( $students[3]['name']); ?></td>
    <td><?php print_r( $students[3]['email']); ?></td>
    <td><?php print_r( $students[3]['status']); ?></td>
  </tr>
  <tr>
    <td><?php print_r( $students[4]['name']); ?></td>
    <td><?php print_r( $students[4]['email']); ?></td>
    <td><?php print_r( $students[4]['status']); ?></td>
  </tr> 
</table>
</html>