<?php
//Always add the title of the page here
$title = 'Details';

/** @var mysqli $db */

//beveilig tegen deeplinken
//if (!isset($_SESSION['user'])) {
//    header('Location: register.php');
//}
//beveiliging tegen sql injections.
$objectId = mysqli_escape_string($db,$_GET['id']);

$query = "SELECT * FROM objects WHERE id = $objectId";

$result = mysqli_query($db, $query) or die('Error ' . mysqli_error($db) . ' with query ' . $query);

$object = mysqli_fetch_assoc($result);

mysqli_close($db);

?>

<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  </head>
  <body>
    <canvas class="webgl"></canvas>
    <script type="module" src="/main.js"></script>
  </body>
</html>

<script>
    import * as THREE from 'three';
    import './style.css';
    import { OrbitControls } from 'three/examples/jsm/controls/OrbitControls.js';
    import { GLTFLoader } from 'three/addons/loaders/GLTFLoader.js';

    // create a scene
    const scene = new THREE.Scene();
    const loader = new GLTFLoader();

    // Load GLTF model
    loader.load('/9_18_2024.glb', function (gltf) {
        const model = gltf.scene;

        // Adjust model scale and position
        model.scale.set(10, 10, 10);  // Change these values based on the model size
        model.position.set(0, 0, 0);  // Center the model in the scene

        scene.add(model);
    }, undefined, function (error) {
        console.error(error);
    });

    // Sizes
    const sizes = {
        width: window.innerWidth,
        height: window.innerHeight
    };

    // Lights
    const light = new THREE.PointLight(0xffffff, 20, 100);  // Reduced intensity
    light.position.set(10, 10, 10);
    scene.add(light);

    const ambientLight = new THREE.AmbientLight(0xffffff, 0.5);  // Added ambient light for better visibility
    scene.add(ambientLight);

    // Camera
    const camera = new THREE.PerspectiveCamera(45, sizes.width / sizes.height);
    camera.position.z = 10;
    scene.add(camera);

    // Renderer
    const canvas = document.querySelector('.webgl');
    const renderer = new THREE.WebGLRenderer({ canvas });
    renderer.setSize(sizes.width, sizes.height);
    renderer.setPixelRatio(Math.min(window.devicePixelRatio, 2));  // Set pixel ratio based on device
    renderer.render(scene, camera);

    // Controls
    const controls = new OrbitControls(camera, canvas);
    controls.enableDamping = true;
    controls.enableZoom = false;  // Allow zoom in and out to find the model
    controls.enablePan = false;  // Allow panning
    controls.autoRotate = true;
    controls.autoRotateSpeed = 2;
    controls.update();

    // Resize handling
    window.addEventListener('resize', () => {
        sizes.width = window.innerWidth;
        sizes.height = window.innerHeight;
        // Update camera
        camera.aspect = sizes.width / sizes.height;
        camera.updateProjectionMatrix();
        // Update renderer
        renderer.setSize(sizes.width, sizes.height);
    });

    // Animation loop
    const loop = () => {
        controls.update();  // Update controls
        renderer.render(scene, camera);
        window.requestAnimationFrame(loop);
    };

    loop();
</script>