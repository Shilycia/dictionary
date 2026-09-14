<?php
$koneksi = mysqli_connect("localhost", "root", "", "dictionary");

if(!$koneksi){
    die("Koneksi Gagal: " . mysqli_connect_error());
}

$query = mysqli_query($koneksi, "SELECT * FROM syntax");
$data = $query ? mysqli_fetch_all($query, MYSQLI_NUM) : [];


if($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $script = $_POST['script'];
    $result = $_POST['result'];

    $insertQuery = "INSERT INTO syntax (name, script, result) VALUES ('$name', '$script', '$result')";

    if(mysqli_query($koneksi, $insertQuery)) {
        header("Location: index.php");
        exit();
    } else {
        echo "Error: " . mysqli_error($koneksi);
    }

}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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

        table {
            border-radius: 20px;
            overflow: hidden;
            border-collapse: collapse;
        }

        thead th {      
            background-color: aqua;  
            padding: 10px 20px;
            font-weight: bold;
        }

        tbody td {
            width: max-content;
            padding: 10px 20px;
            background-color: white;
        }

        .container-form {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            background-color: rgba(0, 0, 0, 0.5);
            position: absolute;
            top: 0;
            width: 100vw;
            height: 100vh;
            display: none;
        }

        .header-form {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        form {
            display: flex;
            width: 300px;
            flex-direction: column;
            gap: 20px;
            padding: 30px 50px;
            background-color: white;
            border-radius: 20px;
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
        }

        button {
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            background-color: aqua;
            cursor: pointer;
        }

    </style>
</head>
<body>
    <div class="container"> 

        
        <div class="container-form" id="container-form">
            <form action="index.php" method="POST">
                <div class="header-form">
                    <h3>FORM TAMBAH DATA</h3>
                    <label id="back">Back ></label>
                </div>
                <label for="name">Nama:</label>
                <input type="text" id="name" name="name" required>
                <label for="script">Script:</label>
                <textarea id="script" name="script" required></textarea>
                <label for="result">Result:</label>
                <textarea id="result" name="result" required></textarea>
                <button type="submit">Tambah Data</button>
            </form>
        </div>
        
        <table>
            <thead>
                <tr> 
                    <th>NO</th>
                    <th>NAMA</th>
                    <th>SCRIPT</th>
                    <th>RESULT</th>
                    <th colspan="2">ACTION</th>
                </tr>
            </thead>
            <tbody>
                <?php  
                    if ($data) {
                        for($i = 0; $i < count($data); $i++) {
                            echo "<tr>";
                            for($j = 0; $j < count($data[$i]); $j++) {
                                echo "<td>" . $data[$i][$j] . "</td>";
                            }
                            echo "<td><a href='edit.php?id=" . $data[$i][0] . "'>Edit</a></td>"; echo "<td><a href='delete.php?id=" . $data[$i][0] . "'>Delete</a></td>";
                            echo "</tr>";
                        }
                    } else {
                        echo "<tr><td colspan='4'>data tidak tersedia</td></tr>";
                    }
                ?>          
            </tbody>
        </table>

        <button onclick="showform()" style="margin-top: 20px;">Tambah Data</button>

    </div>

    <script>
        
        function showform() {
            document.querySelector(".container-form").style.display = "flex";
        }

        document.getElementById("back").addEventListener("click", function() {
            document.querySelector(".container-form").style.display = "none";
        });

    </script>
</body>
</html>