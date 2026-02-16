<?php
include("../config/db.php");

$id = $_GET["id"] ?? null;
if (!$id) { die("Missing ID"); }

// fetch existing record
$stmt = $conn->prepare("SELECT * FROM staff WHERE id = ?");
$stmt->bind_param("i", $id);
$stmt->execute();
$data = $stmt->get_result()->fetch_assoc();

if (!$data) { die("Record not found"); }

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

    $update = $conn->prepare("UPDATE staff SET
        indexNumber=?,
        fullNames=?,
        email=?,
        currentLocation=?,
        highestLevelOfEducation=?,
        dutyStation=?,
        availabilityForRemoteWork=?,
        softwareExpertise=?,
        softwareExpertiseLevel=?,
        language=?,
        levelofResponsibility=?
        WHERE id=?
    ");

    $update->bind_param(
        "sssssssssssi",
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
        $levelofResponsibility,
        $id
    );

    if ($update->execute()) {
        header("Location: list.php");
        exit;
    } else {
        $message = "Error updating record: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Staff</title>
</head>
<body>
    <h2>Edit Staff</h2>

    <?php if ($message) echo "<p style='color:red;'>$message</p>"; ?>

    <form method="POST">
        <label>Index Number:</label><br>
        <input type="text" name="indexNumber" value="<?php echo htmlspecialchars($data["indexNumber"]); ?>" required><br><br>

        <label>Full Names:</label><br>
        <input type="text" name="fullNames" value="<?php echo htmlspecialchars($data["fullNames"]); ?>" required><br><br>

        <label>Email:</label><br>
        <input type="email" name="email" value="<?php echo htmlspecialchars($data["email"]); ?>" required><br><br>

        <label>Current Location:</label><br>
        <input type="text" name="currentLocation" value="<?php echo htmlspecialchars($data["currentLocation"]); ?>"><br><br>

        <label>Highest Level Of Education:</label><br>
        <input type="text" name="highestLevelOfEducation" value="<?php echo htmlspecialchars($data["highestLevelOfEducation"]); ?>"><br><br>

        <label>Duty Station:</label><br>
        <input type="text" name="dutyStation" value="<?php echo htmlspecialchars($data["dutyStation"]); ?>"><br><br>

        <label>Availability For Remote Work:</label><br>
        <select name="availabilityForRemoteWork">
            <option value="Yes" <?php if($data["availabilityForRemoteWork"]==="Yes") echo "selected"; ?>>Yes</option>
            <option value="No"  <?php if($data["availabilityForRemoteWork"]==="No") echo "selected"; ?>>No</option>
        </select><br><br>

        <label>Software Expertise:</label><br>
        <input type="text" name="softwareExpertise" value="<?php echo htmlspecialchars($data["softwareExpertise"]); ?>"><br><br>

        <label>Software Expertise Level:</label><br>
        <input type="text" name="softwareExpertiseLevel" value="<?php echo htmlspecialchars($data["softwareExpertiseLevel"]); ?>"><br><br>

        <label>Language:</label><br>
        <input type="text" name="language" value="<?php echo htmlspecialchars($data["language"]); ?>"><br><br>

        <label>Level of Responsibility:</label><br>
        <input type="text" name="levelofResponsibility" value="<?php echo htmlspecialchars($data["levelofResponsibility"]); ?>"><br><br>

        <button type="submit">Update</button>
        <a href="list.php">Back to List</a>
    </form>
</body>
</html>
