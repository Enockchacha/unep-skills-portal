<?php
include("../config/db.php");

$message = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $indexNumber = $_POST["indexNumber"] ?? "";
    $fullNames = $_POST["fullNames"] ?? "";
    $email = $_POST["email"] ?? "";
    $currentLocation = $_POST["currentLocation"] ?? "";
    $highestLevelOfEducation = $_POST["highestLevelOfEducation"] ?? "";
    $dutyStation = $_POST["dutyStation"] ?? "";
    $availabilityForRemoteWork = $_POST["availabilityForRemoteWork"] ?? "";
    $softwareExpertise = $_POST["softwareExpertise"] ?? "";
    $softwareExpertiseLevel = $_POST["softwareExpertiseLevel"] ?? "";
    $language = $_POST["language"] ?? "";
    $levelofResponsibility = $_POST["levelofResponsibility"] ?? "";

    $stmt = $conn->prepare("INSERT INTO staff 
    (indexNumber, fullNames, email, currentLocation, highestLevelOfEducation, dutyStation, availabilityForRemoteWork, softwareExpertise, softwareExpertiseLevel, language, levelofResponsibility)
    VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");

    $stmt->bind_param(
        "sssssssssss",
        $indexNumber,
        $fullNames,
        $email,
        $currentLocation,
        $highestLevelOfEducation,
        $dutyStation,
        $availabilityForRemoteWork,
        $softwareExpertise,
        $softwareExpertiseLevel,
        $language,
        $levelofResponsibility
    );

    if ($stmt->execute()) {
        header("Location: list.php");
        exit;
    } else {
        $message = "Error saving record: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Add Staff</title>
</head>
<body>
    <h2>Add Staff</h2>

    <?php if ($message) echo "<p style='color:red;'>$message</p>"; ?>

    <form method="POST">
        <label>Index Number:</label><br>
        <input type="text" name="indexNumber" required><br><br>

        <label>Full Names:</label><br>
        <input type="text" name="fullNames" required><br><br>

        <label>Email:</label><br>
        <input type="email" name="email" required><br><br>

        <label>Current Location:</label><br>
        <input type="text" name="currentLocation"><br><br>

        <label>Highest Level Of Education:</label><br>
        <input type="text" name="highestLevelOfEducation"><br><br>

        <label>Duty Station:</label><br>
        <input type="text" name="dutyStation"><br><br>

        <label>Availability For Remote Work:</label><br>
        <select name="availabilityForRemoteWork">
            <option value="Yes">Yes</option>
            <option value="No">No</option>
        </select><br><br>

        <label>Software Expertise:</label><br>
        <input type="text" name="softwareExpertise"><br><br>

        <label>Software Expertise Level:</label><br>
        <input type="text" name="softwareExpertiseLevel"><br><br>

        <label>Language:</label><br>
        <input type="text" name="language"><br><br>

        <label>Level of Responsibility:</label><br>
        <input type="text" name="levelofResponsibility"><br><br>

        <button type="submit">Save</button>
        <a href="list.php">Back to List</a>
    </form>
</body>
</html>
