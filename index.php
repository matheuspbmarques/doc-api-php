<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DOC API PHP</title>
    <link rel="stylesheet" href="style/style.css">

    <!-- Outfit Font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@100..900&display=swap" rel="stylesheet">

    <!-- Google Icons -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,200,0,0" />

    <!-- Favicon -->
    <link rel="shortcut icon" href="public/icon.png" type="image/x-icon">
</head>
<body>

    <?php
        // Get file
        $doc = __DIR__ . "/doc.json";

        // Get file contents
        $docString = file_get_contents($doc);

        // Parse json string to array
        $docArray = json_decode($docString);

        function parseJson($body, $identQtd = 1, $jumpLine = false){
            $bodyParsed = "{\n";
            $identCount = 0;
            $ident = "";

            while($identCount < $identQtd){
                $ident = $ident . "     ";
                $identCount = $identCount + 1;
            };

            foreach($body as $key => $value){
                $fieldType = gettype($body->$key);

                if($fieldType == 'object'){
                    $object = parseJson($body->$key, $identQtd + 1, true);

                    $bodyParsed = $bodyParsed . "$ident$key: $object";
                }else{
                    $bodyParsed = $bodyParsed . "$ident$key: $value\n";
                };
            };

            $identCount = 1;
            $identFinal = "";

            while($identCount < $identQtd){
                $identFinal = $identFinal . "     ";
                $identCount = $identCount + 1;
            };

            $bodyParsed = $jumpLine ? $bodyParsed . "$identFinal}\n" : $bodyParsed . "}";

            return $bodyParsed;
        }
    ?>

    <nav>
        <img src="./assets/svgs/logo.svg" alt="logo" height="24" />

        <!-- Sections -->
        <ul>
            <?php foreach($docArray as $doc): ?>

                <?php
                    $icon = $doc->icon;
                    $title = $doc->title;
                    $routes = $doc->routes;
                ?>

                <li>
                    <button onclick="showRouter(event)">

                        <!-- Section icon -->
                        <?php if($icon): ?>
                            <span class="material-symbols-outlined">
                                <?php echo $icon; ?>
                            </span>
                        <?php endif; ?>

                        <!-- Section title -->
                        <?php echo $title; ?>

                        <span class="material-symbols-outlined">expand_more</span>
                    </button>

                    <!-- Routes -->
                    <ul>
                        <?php foreach($routes as $router): ?>

                            <?php
                                $title = $router->title;
                                $type = $router->type;
                                $color;
                            ?>

                            <?php //Switch color
                                switch($type){
                                    case 'POST': {
                                        $color = "#27ae60";
                                        break;
                                    };
                                    case 'PUT': {
                                        $color = "#d35400";
                                        break;
                                    };
                                    case 'GET': {
                                        $color = "#2980b9";
                                        break;
                                    };
                                    case 'DELETE': {
                                        $color = "#c0392b";
                                        break;
                                    };
                                };
                            ?>

                            <li>
                                <button onclick="navigate('<?php echo str_replace(" ", "-", str_replace("-", "", strtolower($title))); ?>')">
                                    <span style="<?php echo "background-color: $color"; ?>">
                                        <?php echo $type; ?>
                                    </span>
    
                                    <?php echo $title; ?>
                                </button>
                            </li>
                        <?php endforeach; ?>
                    </ul>

                </li>
            <?php endforeach; ?>
        </ul>
    </nav>

    <main id="contents">
        <?php foreach($docArray as $doc): ?>
            <section>
                <!-- Title -->
                <h2>
                    <?php echo $doc->title; ?>
                </h2>

                <!-- Routes -->
                <?php foreach($doc->routes as $router): ?>
                    <section id="<?php echo str_replace(" ", "-", str_replace("-", "", strtolower($router->title))); ?>">
                        <h3>
                            <?php echo $router->title; ?>
                        </h3>
    
                        <!-- Router -->
                        <?php if($router->router): ?>
                            <div class="router">
                                <h4>Rota:</h4>
    
                                <code>
                                    <span>
                                        <?php echo $router->router; ?>
                                    </span>
    
                                    <button onclick="copyRouter(event)">
                                        <span class="material-symbols-outlined">
                                            content_copy
                                        </span>
                                    </button>
                                </code>
                            </div>
                        <?php endif; ?>
    
                        <!-- Body -->
                        <?php if($router->body): ?>
                            <div class="body">
                                <h4>Corpo da requisição:</h4>
    
                                <code>
                                    <?php
    
                                        $body = $router->body;
    
                                        echo "<pre>" . parseJson($body) . "</pre>";
                                    ?>
    
                                    <button onclick="copyJson(event)">
                                        <span class="material-symbols-outlined">
                                            content_copy
                                        </span>
                                    </button>
                                </code>
                            </div>
                        <?php endif; ?>
    
                        <!-- Reponse -->
                        <?php if($router->response): ?>
                            <div>
                                <h4>Resposta da requisição:</h4>
                                <code>
                                    <?php
                                        $response = $router->response;
        
                                        echo "<pre>" . parseJson($response) . "</pre>" ;
                                    ?>
                                    <button onclick="copyJson(event)">
                                        <span class="material-symbols-outlined">
                                            content_copy
                                        </span>
                                    </button>
                                </code>
                            </div>
                        <?php endif; ?>
                    </section>
                <?php endforeach; ?>
            </section>
        <?php endforeach; ?>
    </main>

    <script src="./scripts/showRoutes.js"></script>
    <script src="./scripts/navigate.js"></script>
    <script src="./scripts/copyCode.js"></script>
</body>
</html>