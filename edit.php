<?php
$koneksi = mysqli_connect("localhost", "root", "", "dictionary");

if(!$koneksi){
    die("Koneksi Gagal: " . mysqli_connect_error());
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = intval($_POST['id']);
    
    $name = mysqli_real_escape_string($koneksi, $_POST['name']);
    $script = mysqli_real_escape_string($koneksi, $_POST['script']);
    $result = mysqli_real_escape_string($koneksi, $_POST['result']);

    $updateQuery = "UPDATE syntax SET name='$name', script='$script', result='$result' WHERE id=$id";

    if(mysqli_query($koneksi, $updateQuery)) {
        header("Location: index.php");
        exit();
    } else {
        echo "Error: " . mysqli_error($koneksi);
    }
}

if (isset($_GET['id'])) {
    $id = intval($_GET['id']);
    $query = mysqli_query($koneksi, "SELECT * FROM syntax WHERE id = $id");
    
    $data = mysqli_fetch_assoc($query);

    if (!$data) {
        die("Data tidak ditemukan!");
    }
} else {
    header("Location: index.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            font-family: "Arial", sans-serif;
        }

        .container {
            width: 100vw;
            height: 100vh;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            background-color: antiquewhite;
        }

        form {
            display: flex;
            width: 300px;
            flex-direction: column;
            gap: 20px;
            padding: 30px 50px;
            background-color: white;
            border-radius: 20px;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
        }

        .header-form {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .header-form a {
            text-decoration: none;
            color: black;
            font-weight: bold;
            cursor: pointer;
        }

        label {
            font-weight: bold;
        }

        input, textarea {
            padding: 5px;
            border-radius: 5px;
            border: 1px solid #ccc;
        }

        textarea {
            resize: none;
            height: 80px;
        }

        button {
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            background-color: aqua;
            cursor: pointer;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <div class="container"> 
        <form action="edit.php" method="POST">
            <div class="header-form">
                <h3>FORM EDIT DATA</h3>
                <a href="index.php">Back ></a>
            </div>
            
            <input type="hidden" name="id" value="<?php echo $data['id']; ?>">
            
            <label for="name">Nama:</label>
            <input type="text" id="name" name="name" value="<?php echo htmlspecialchars($data['name']); ?>" required>
            
            <label for="script">Script:</label>
            <textarea id="script" name="script" required><?php echo htmlspecialchars($data['script']); ?></textarea>
            
            <label for="result">Result:</label>
            <textarea id="result" name="result" required><?php echo htmlspecialchars($data['result']); ?></textarea>
            
            <button type="submit">Update Data</button>
        </form>
    </div>
</body>
</html>