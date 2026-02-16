<?php
include("../config/db.php");

$result = $conn->query("SELECT * FROM staff ORDER BY id DESC");
?>
<!DOCTYPE html>
<html>
<head>
    <title>Staff List</title>
</head>
<body>
    <h2>Staff Listing</h2>

    <a href="create.php">+ Add Staff</a>
    <br><br>

    <table border="1" cellpadding="8">
        <tr>
            <th>ID</th>
            <th>IndexNumber</th>
            <th>FullNames</th>
            <th>Email</th>
            <th>CurrentLocation</th>
            <th>HighestLevelOfEducation</th>
            <th>DutyStation</th>
            <th>Actions</th>
        </tr>

        <?php while($row = $result->fetch_assoc()): ?>
        <tr>
            <td><?php echo $row["id"]; ?></td>
            <td><?php echo $row["indexNumber"]; ?></td>
            <td><?php echo $row["fullNames"]; ?></td>
            <td><?php echo $row["email"]; ?></td>
            <td><?php echo $row["currentLocation"]; ?></td>
            <td><?php echo $row["highestLevelOfEducation"]; ?></td>
            <td><?php echo $row["dutyStation"]; ?></td>
            <td>
                <a href="edit.php?id=<?php echo $row["id"]; ?>">Edit</a> |
                <a href="delete.php?id=<?php echo $row["id"]; ?>" onclick="return confirm('Delete this record?')">Delete</a>
            </td>
        </tr>
        <?php endwhile; ?>
    </table>
</body>
</html>
