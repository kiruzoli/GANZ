<!DOCTYPE html>
<html lang=""en">
<head>
	<meta charset="UTF-8">
	<title>EV Charger</title>
	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<style>
        /* Fekete sáv beállításai */
        .black-bar {
            background-color: #000; /* Fekete háttérszín */
            padding: 20px 0; /* Néhány padding a sávban */

        }
        /* Kép méretének beállítása */
        .black-bar img {
            max-width: 150px; /* Kép maximális szélessége */
            height: auto; /* Arányos magasság fenntartása */

        }
        .form-control{
            width: 500px;
        }
        .container {
            height: 100vh;
            display: flex;
            align-items: center;
        }
        .form-container {
            border-right: 2px solid #ccc;
            padding-right: 20px;
        }
        .image-container {
            text-align: center;
        }
        img {
            max-width: 100%;
            height: auto;
        }

	</style>
</head>
<body>
<!-- Fekete sáv a képhez -->
<div class="black-bar text-center">
	<img src="ganzlogo_menu.png" alt="ganz logó" class="img-fluid">
    <img src="due_logo.png" alt="due logó"  height="200">
</div>


<!-- Bootstrap JS, Popper.js, és jQuery CDN-ek -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>


<div class="container mt-5">

    <div class="row w-100">
        <!-- Bal oldali oszlop: Form -->
        <div class="col-md-6 form-container">
            <h1 class="text-center mb-4">Gépjármű Információ Űrlap</h1>
            <form action="" method="POST">
                    <!-- Gépjármű típusa -->
                    <div class="form-group">
                        <label for="carType"><h3>Márka</h3></label>
                        <select id="mySelect" class="form-control" name="marka">
                            <!-- JavaScript fogja feltölteni az opciókat -->
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="carType"><h3>Modell</h3></label>
                        <input type="text" class="form-control" id="carType" placeholder="Adja meg a gépjármű típusát" name="modell" required>
                    </div>
                    <!-- Évjárat -->
                    <div class="form-group">
                        <label for="yearOfMake"><h3>Évjárat</h3></label>
                        <input type="number" class="form-control" id="yearOfMake" placeholder="Adja meg az évjáratot" min="1900" max="2024" name="carYear"required>
                    </div>

                    <!-- Töltőnyílás magassága delta Z-->
                    <div class="form-group">
                        <label for="fillerHeight"><h3>Töltőnyílás magassága  &Delta; Z (cm) </h3></label>
                        <input type="number" class="form-control" id="fillerHeight" placeholder="Adja meg a töltőnyílás helyének magasságát (cm)" min="1" step="0.1" name="dZ" required>
                    </div>

                    <!-- Töltőnyílás szélessége delta X-->
                    <div class="form-group">
                        <label for="fillerWidth"><h3>Töltőnyílás szélessége &Delta; X (cm)</h3></label>
                        <input type="number" class="form-control" id="fillerWidth" placeholder="Adja meg a töltőnyílás helyének szélességét (cm)" min="1" step="0.1" name="dX"required>
                    </div>

                    <!-- Töltőnyílás szélessége delta y1-->
                    <div class="form-group">
                        <label for="fillerWidth"><h3>Töltőnyílás szélessége &Delta; Y1 (cm)</h3></label>
                        <input type="number" class="form-control" id="fillerWidth" placeholder="Adja meg az autó elején ballról mért távolságot (cm)" min="1" step="0.1" name="dX"required>
                    </div>

                    <!-- Töltőnyílás szélessége delta y2-->
                    <div class="form-group">
                        <label for="fillerWidth"><h3>Töltőnyílás szélessége &Delta; Y2 (cm)</h3></label>
                        <input type="number" class="form-control" id="fillerWidth" placeholder="Adja meg az autó elején jobbról mért távolságot (cm)" min="1" step="0.1" name="y2"required>
                    </div>

                    <br>
                    <!-- Küldés gomb -->
                    <button type="submit" class="btn btn-primary btn-block">Küldés</button>
                    <br>
                </form>
            <script>
                // A txt fájl beolvasása és az opciók létrehozása
                fetch('marka.txt')  // Feltételezzük, hogy az 'options.txt' ugyanabban a könyvtárban van
                    .then(response => response.text())  // Az eredményt szövegként olvassuk be
                    .then(data => {
                        const options = data.split('\n');  // Sorokra bontjuk a fájlt
                        const select = document.getElementById('mySelect');

                        // Iterálunk az opciókon és létrehozzuk az option elemeket
                        options.forEach(optionText => {
                            const option = document.createElement('option');
                            option.value = optionText.trim();  // A sorból az értéket adjuk meg
                            option.text = optionText.trim();   // Az option szövege is a fájlból származik
                            select.appendChild(option);        // Az option elemet hozzáadjuk a select-hez
                        });
                    })
                    .catch(error => console.error('Hiba történt a fájl beolvasása közben:', error));
            </script>
        </div>
        <div class="col-md-6 image-container">
            <h4 font-color="red"> Amennyiben az Ön gépjárműve nem található a márkák között sajnos az töltőállomásunkkal nem tölthető </h4>
            <p> <b>Ha az ön autójának töltőnyílás oldalt található kérem használja ezt a rajzot: </b></p>
            <img src="VW_mert.png" alt="Minta">
            <br>
            <p> <b>Ha az ön autójának töltőnyílás elől vagy hátul található kérem használja ezt a rajzot:</b></p>
            <img src="kiasoul_mert.png" alt="Minta" width="350" >
            <img src="hyundai_mert.png" alt="Minta" width="250" >
        </div>
    </div>
</div>
</body>
</html>
<?php
//jelenleg localhostra állítva
class Database {
	private $host = 'localhost';    // Adatbázis szerver
	private $dbName = 'car_database';   // Adatbázis név
	private $username = 'root';     // MySQL felhasználó
	private $password = '';         // MySQL jelszó
	private $conn;                  // PDO kapcsolat objektum

	// Kapcsolódás az adatbázishoz
	public function connect() {
		$this->conn = null;

		try {
			$dsn        = 'mysql:host=' . $this->host;
			$this->conn = new PDO( $dsn, $this->username, $this->password );
			$this->conn->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
			echo "Kapcsolódás sikeres!<br>";
		} catch ( PDOException $e ) {
			echo 'Kapcsolódási hiba: ' . $e->getMessage();
		}

		return $this->conn;
	}

	// Adatbázis létrehozása
	public function createDatabase() {
		$sql = "CREATE DATABASE IF NOT EXISTS " . $this->dbName;

		try {
			$this->conn->exec( $sql );
			echo "Adatbázis létrehozva!<br>";
		} catch ( PDOException $e ) {
			echo "Adatbázis létrehozási hiba: " . $e->getMessage();
		}
	}

	// Tábla létrehozása
	public function createTable() {
		$this->conn->exec( "USE " . $this->dbName );

		$sql = "CREATE TABLE IF NOT EXISTS cars (
            id INT(11) AUTO_INCREMENT PRIMARY KEY,
            marka VARCHAR(30) NOT NULL,
            modell VARCHAR(30) NOT NULL,
            carYear YEAR NOT NULL,
            dZ FLOAT(5,2) NOT NULL CHECK (dZ >= 0 AND dZ <= 500),
            dX FLOAT(5,2) NOT NULL CHECK (dX >= 0 AND dX <= 500),
            Y1 FLOAT(5,2) NOT NULL CHECK (Y1 >= 0 AND Y1 <= 500),
            Y2 FLOAT(5,2) NOT NULL CHECK (Y2 >= 0 AND Y2 <= 500)
        )";

		try {
			$this->conn->exec( $sql );
			echo "Táblázat 'cars' létrehozva!<br>";
		} catch ( PDOException $e ) {
			echo "Táblázat létrehozási hiba: " . $e->getMessage();
		}
	}
    //adatok beszúrása
	public function insertData($marka, $modell, $carYear, $dZ, $dX, $Y1, $Y2) {
		$this->conn->exec("USE " . $this->dbName);

		// Ellenőrzés: már létezik-e az adott márka, modell és gyártási év
		$sql_check = "SELECT COUNT(*) FROM cars WHERE marka = :marka AND modell = :modell AND carYear = :carYear";
		$stmt_check = $this->conn->prepare($sql_check);
		$stmt_check->bindParam(':marka', $marka);
		$stmt_check->bindParam(':modell', $modell);
		$stmt_check->bindParam(':carYear', $carYear);
		$stmt_check->execute();

		$count = $stmt_check->fetchColumn();

		if ($count > 0) {
			// Már létezik ez a kombináció
			echo "Hiba: Ez az autó már szerepel az adatbázisban!<br>";
			return;
		}

		// Ha nem létezik, beszúrjuk az adatokat
		$sql_insert = "INSERT INTO cars (marka, modell, carYear, dZ, dX, Y1, Y2) 
                       VALUES (:marka, :modell, :carYear, :dZ, :dX, :Y1, :Y2)";

		try {
			$stmt = $this->conn->prepare($sql_insert);
			$stmt->bindParam(':marka', $marka);
			$stmt->bindParam(':modell', $modell);
			$stmt->bindParam(':carYear', $carYear);
			$stmt->bindParam(':dZ', $dZ);
			$stmt->bindParam(':dX', $dX);
			$stmt->bindParam(':Y1', $Y1);
			$stmt->bindParam(':Y2', $Y2);

			$stmt->execute();
			echo "Adatok sikeresen beszúrva!<br>";
		} catch (PDOException $e) {
			echo "Adatok beszúrási hiba: " . $e->getMessage();
		}
	}
}

// Példányosítás és végrehajtás
$database   = new Database();
$connection = $database->connect();
//$database->createDatabase();
//$database->createTable();

if(!empty($_POST["marka"]) && !empty($_POST["modell"]) && !empty($_POST["carYear"]) && !empty($_POST["dZ"]) && !empty($_POST["dX"]))
    {
	    $database->insertData($_POST["marka"], $_POST["modell"], $_POST["carYear"], $_POST["dZ"], $_POST["dX"], 0, 0);
    }
    else
    {
        echo "Kitöltetlen adatok vannak";
    }