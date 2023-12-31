<?php
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

require '../src/vendor/autoload.php';
$app = new \Slim\App;

$app->get('/orgstructure', function (Request $request, Response $response, array $args) {
    $orgStructure = '{
        "DMMMSU University": {
            "Board of Regents": {
                "Board Secretary": "Dr. Antonio O. Ogbinar",
                "President": "Dr. Jaime I. Manuel, Jr.",
                "University Secretary": "Dr. Antonio O. Ogbinar",
                "Vice Presidents": {
                    "Vice President Academic Affairs": {
                        "Vice President Academic Affairs": "Dr. Elsie M. Pacho",
                        "Directors": {
                            "OIC-Director, Instruction": "Prof. Laiza T. Astodillo",
                            "Director, Student Affairs and Services": "Dr. Shalimar L. Navalta",
                            "Director, Sports": "Dr. Paulo Jan F. Samson",
                            "Director, Cultural Affairs": "Prof. Irene N. Gomez",
                            "Director, National Service Training Program": "Dr. Loide M. Faller",
                            "Director, Library Services & Development": "Dr. Sonia B. Siago",
                            "Director, Student Admission & Records": "Dr. Valoree M. Salamanca",
                            "Director, Alumni Affairs": "Dr. Lher Verell S. Palabay",
                            "Director, Internationalization, Linkages, and ETEEAP": "Dr. Jesus Rafael B. Jarata"
                        }
                    },
                    "Vice President Research & Extension": {
                        "Vice President Research & Extension": "Dr. Angelina T. Gonzales",
                        "Directors": {
                            "Director, Research": "Prof. Keneth G. Bayani",
                            "Director, Extension": "Prof. Emerita D. Galis"
                        }
                    },
                    "Vice President Administration": {
                        "Vice President Administration": "Dr. Antonio O. Ogbinar",
                        "Directors": {
                            "Director, Administrative Services": "Atty. Kristine Gay B. Balanag",
                            "Director, Auxiliary Services": "Dr. Florendo O. Damasco, Jr.",
                            "Director, Finance Services": "Ms. Placida E. De Guzman",
                            "Director, Medical Services": "Dr. Ma. Consuelo W. Alcantara",
                            "Director, Internal Quality Assurance System": "Dr. Angelita J. Prado"
                        }
                    },
                    "Vice President Planning & Resource Development": {
                        "Vice President Planning & Resource Development": "Dr. Priscilo P. Fontanilla",
                        "Directors": {
                            "Director, Management Information System": "Dr. Stephan Kupsch",
                            "Director, Business Affairs": "Prof. Melchor D. Salom",
                            "Director, Planning and Development": "Prof. Lilito D. Gavina",
                            "Director, Resource Development & GAD Focal Person": "Dr. Sherlyn Marie D. Nitura"
                        }
                    },
                    "Admin Support and Technical Support": {
                        "College Deans Institute Directors": {
                            "Chancellor, North La Union Campus": "Dr. Junifer Rey E. Tabafunda",
                            "Chancellor, Mid La Union Campus": "Dr. Eduardo C. Corpuz",
                            "Chancellor, South La Union Campus": "Dr. Joanne C. Rivera"
                        },
                        "Program Coordinators": {
                            "Executive Director, Open University System": "Dr. Cristita G. Guerra"
                        },
                        "R & E Emplementers": {
                            "Executive Director, Sericulture Research & Development Institute": "Dr. Cristeta F. Gapuz",
                            "Executive Director, National Apiculture Research Training & Development Institute": "Dr. Gregory B. Viste"
                        }
                    }
                }
            }
        }
    }';

    $orgStructure = json_decode($orgStructure, true);

    $response = $response->withHeader('Content-Type', 'application/json');

    $response->getBody()->write(json_encode($orgStructure, JSON_PRETTY_PRINT));

    return $response;
});

$app->run();
?>