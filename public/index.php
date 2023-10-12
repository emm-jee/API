<?php
header("Access-Control-Allow-Origin: *");
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

require '../src/vendor/autoload.php';
$app = new \Slim\App;

// Endpoint to get greeting
$app->get('/getName/{fname}/{lname}', function (Request $request, Response $response, array $args) {
    $name = $args['fname'] . " " . $args['lname'];
    $response->getBody()->write("Hello User, $name");
    return $response;
});

//Inserting Data
$app->POST('/postName', function (Request $request, Response $response, array $args) {
    $data = json_decode($request->getBody());
    $fname = $data->fname;
    $lname = $data->lname;
    //Database connection
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "demo";
    try {
        $conn = new PDO(
            "mysql:host=$servername;dbname=$dbname",

            $username,
            $password
        );
        $conn->setAttribute(
            PDO::ATTR_ERRMODE,

            PDO::ERRMODE_EXCEPTION
        );
        //Inserting Data to Database
        $sql = "INSERT INTO names (fname, lname)
            VALUES ('" . $fname . "','" . $lname . "')";
        $conn->exec($sql);
        $response->getBody()->write(json_encode(array("status" => "success", "data" => null)));

    } catch (PDOException $e) {
        $response->getBody()->write(
            json_encode(
                array(
                    "status" => "error",
                    "message" => $e->getMessage()
                )
            )
        );
    }
    $conn = null;
    return $response;
});

//Retrieving Data
$app->GET('/postPrint', function (Request $request, Response $response, array $args) {
    // Database
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "demo";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "SELECT * FROM names";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $data = array();
        while ($row = $result->fetch_assoc()) {
            array_push(
                $data,
                array(
                    "fname" => $row["fname"],
                    "lname" => $row["lname"]
                )
            );
        }
        $data_body = array("status" => "success", "data" => $data, );
        $response->getBody()->write(json_encode($data_body));
    } else {
        $data_body = array("status" => "success", "data" => null);
        $response->getBody()->write(json_encode($data_body));
    }

    $conn->close();
    return $response;
});

//Update
$app->PUT('/updateName/{id}', function (Request $request, Response $response, array $args) {
    $id = $args['id'];
    $data = json_decode($request->getBody());
    $fname = $data->fname;
    $lname = $data->lname;

    // Database connection
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "demo";

    try {
        $conn = new PDO(
            "mysql:host=$servername;dbname=$dbname",
            $username,
            $password
        );

        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "UPDATE names SET fname = '$fname', lname = '$lname' WHERE id = $id";
        $conn->exec($sql);

        $response->getBody()->write(json_encode(array("status" => "success", "data" => null)));
    } catch (PDOException $e) {
        $response->getBody()->write(
            json_encode(
                array(
                    "status" => "error",
                    "message" => $e->getMessage()
                )
            )
        );
    }

    $conn = null;
    return $response;
});
//DELETE
$app->DELETE('/deleteName/{id}', function (Request $request, Response $response, array $args) {
    $id = $args['id'];

    // Database connection
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "demo";

    try {
        $conn = new PDO(
            "mysql:host=$servername;dbname=$dbname",
            $username,
            $password
        );
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "DELETE FROM names WHERE id = $id";
        $conn->exec($sql);

        $response->getBody()->write(json_encode(array("status" => "success", "data" => null)));
    } catch (PDOException $e) {
        $response->getBody()->write(
            json_encode(
                array(
                    "status" => "error",
                    "message" => $e->getMessage()
                )
            )
        );
    }

    $conn = null;
    return $response;
});


$app->run();
?>