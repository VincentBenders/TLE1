import * as THREE from 'three';
import { GLTFLoader, OrbitControls } from "three/examples/jsm/Addons.js";

    const item = 'object.glb';
    const itemurl = 'http://localhost/TLE1/includes/3dobjects//' + item;

      // Set up the scene
      const scene = new THREE.Scene();

      // Create a camera (perspective)
      const camera = new THREE.PerspectiveCamera(75, window.innerWidth / window.innerHeight, 0.1, 1000);
      camera.position.z = 5;

      // Create a renderer
      const renderer = new THREE.WebGLRenderer({ antialias: true });
      renderer.setSize(window.innerWidth, window.innerHeight);
      document.body.appendChild(renderer.domElement);

      // Add lighting
      const light = new THREE.DirectionalLight(0xffffff, 1);
      light.position.set(5, 5, 5).normalize();
      scene.add(light);

      // Load a 3D model (GLTF format)
      const loader = new GLTFLoader();
      loader.load(
        itemurl,
        (gltf) => {
          const model = gltf.scene;
          // Adjust model scale and position
    model.scale.set(10, 10, 10);  // Change these values based on the model size
    model.position.set(0, -1, 0);  // Center the model in the scene
        // model.
          scene.add(model);
          animate();
        },
        undefined,
        (error) => {
          console.error('An error occurred while loading the model', error);
        }
      );

      // Render loop
      function animate() {
        requestAnimationFrame(animate);
        renderer.render(scene, camera);
      }

      window.addEventListener('resize', () => {
        renderer.setSize(window.innerWidth, window.innerHeight);
        camera.aspect = window.innerWidth / window.innerHeight;
        camera.updateProjectionMatrix();
      });

      ///////////////////////////////
    //   import * as THREE from 'three';
    //   import { GLTFLoader} from "three/examples/jsm/Addons.js";

    //   const item = 'object.glb';
    //   const itemurl = 'http://localhost/TLE1/includes/3dobjects//' + item;

    //   // Set up the scene
    //   const scene = new THREE.Scene();

    //   // Create a camera (perspective)
    //   const camera = new THREE.PerspectiveCamera(75, window.innerWidth / window.innerHeight, 0.1, 1000);
    //   camera.position.z = 5;

    //   let mouseX = window.innerWidth / 2;
    //   let mouseY = window.innerHeight / 2;
    //   let object;

    //   let controls;

    //   let objToRender = 'eye';

    //   // Load a 3D model (GLTF format)
    //   const loader = new GLTFLoader();
    //   loader.load(
    //     itemurl,
    //     (gltf) => {
    //       const model = gltf.scene;
    //       // Adjust model scale and position
    // model.scale.set(10, 10, 10);  // Change these values based on the model size
    // model.position.set(0, -1, 0);  // Center the model in the scene
    //     // model.
    //       scene.add(model);
    //       animate();
    //     },
    //     undefined,
    //     (error) => {
    //       console.error('An error occurred while loading the model', error);
    //     }
    //   );

    //   // Create a renderer
    //   const renderer = new THREE.WebGLRenderer({ antialias: true });
    //   renderer.setSize(window.innerWidth, window.innerHeight);
    //   document.body.appendChild(renderer.domElement);

    //   // Add lighting
    //   const light = new THREE.DirectionalLight(0xffffff, 1);
    //   light.position.set(5, 5, 5).normalize();
    //   scene.add(light);

    //   // controls = new OrbitControls(camera, render.domElement);

    //     // Render loop
    //   function animate() {
    //     requestAnimationFrame(animate);
    //     object.rotation.y = -3 + mouseX / window.innerWidth * 3;
    //     object.rotation.x = -1.2 + mouseY * 2.5 / window.innerHeight;
    //     renderer.render(scene, camera);
    //   }

    //   document.onmousemove = (e) => {
    //     mouseX = e.clientX;
    //     mouseY = e.clientY;
    //   }

    //   window.addEventListener('resize', () => {
    //     renderer.setSize(window.innerWidth, window.innerHeight);
    //     camera.aspect = window.innerWidth / window.innerHeight;
    //     camera.updateProjectionMatrix();
    //   });

    //   animate();