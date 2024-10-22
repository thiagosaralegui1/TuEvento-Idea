// Importa la librería THREE.js
import * as THREE from "https://cdn.skypack.dev/three@0.129.0/build/three.module.js";
// Para permitir que la cámara se mueva con controles de primera persona
import { PointerLockControls } from "https://cdn.skypack.dev/three@0.129.0/examples/jsm/controls/PointerLockControls.js";
// Para permitir la importación del archivo .gltf/.glb
import { GLTFLoader } from "https://cdn.skypack.dev/three@0.129.0/examples/jsm/loaders/GLTFLoader.js";

// Crear un contenedor para la pantalla de carga

const loadingScreen = document.createElement('div');
loadingScreen.style.position = 'fixed';
loadingScreen.style.top = '0'; // Asegura que empiece desde la parte superior
loadingScreen.style.left = '0'; // Asegura que empiece desde el lado izquierdo
loadingScreen.style.width = '100vw'; // Ocupa el ancho completo de la pantalla
loadingScreen.style.height = '100vh'; // Ocupa el alto completo de la pantalla
loadingScreen.style.backgroundColor = 'rgba(0, 0, 0, 0.5)'; // Fondo semi-transparente
loadingScreen.style.color = 'white';
loadingScreen.style.display = 'flex';
loadingScreen.style.flexDirection = 'column';
loadingScreen.style.alignItems = 'center';
loadingScreen.style.justifyContent = 'center'; // Centra verticalmente
loadingScreen.style.zIndex = '9999'; // Asegúrate de que esté por encima de otros elementos
 // Asegúrate de que esté por encima de otros elementos

// Crear un elemento canvas para el círculo de carga
const canvas = document.createElement('canvas');
const context = canvas.getContext('2d');
canvas.width = 200;  // Ancho del canvas
canvas.height = 200; // Alto del canvas
loadingScreen.appendChild(canvas);

// Texto de carga
const loadingText = document.createElement('h1');
loadingText.innerText = 'Cargando...';
loadingScreen.appendChild(loadingText);

document.body.appendChild(loadingScreen); // Añadir el loader al cuerpo del documento

// Función para dibujar el círculo de carga
function drawLoadingCircle(percentage) {
  const radius = 70; // Radio del círculo
  const centerX = canvas.width / 2; // Centro del canvas
  const centerY = canvas.height / 2; // Centro del canvas

  // Limpiar el canvas
  context.clearRect(0, 0, canvas.width, canvas.height);

  // Círculo de fondo
  context.beginPath();
  context.arc(centerX, centerY, radius, 0, 2 * Math.PI, false);
  context.fillStyle = 'rgba(255, 255, 255, 0.1)'; // Fondo del círculo
  context.fill();

  // Círculo de progreso
  context.beginPath();
  context.arc(centerX, centerY, radius, -Math.PI / 2, (2 * Math.PI * percentage / 100) - Math.PI / 2, false);
  context.lineWidth = 15; // Ancho del borde
  context.strokeStyle = 'white'; // Color del borde
  context.stroke();
}

// Crea una escena de Three.JS
const scene = new THREE.Scene();

// Crea la cámara en primera persona
const cameraFP = new THREE.PerspectiveCamera(75, window.innerWidth / window.innerHeight, 0.1, 1000);
cameraFP.position.set(40, 15, -110); // Posición inicial de la cámara, simulando la altura de una persona
cameraFP.rotation.y = Math.PI / 1;

// Crea una lista de cámaras para alternar
const cameras = [cameraFP];
let currentCameraIndex = 0; // Para mantener el seguimiento de la cámara actual
let activeCamera = cameras[currentCameraIndex]; // Iniciamos con la primera cámara (FP)

// Instancia un cargador para el archivo .gltf/.glb
const loader = new GLTFLoader();

// Carga el archivo glb
loader.load(
  'ChacraEvento.glb', // Ruta del archivo .glb
  function (gltf) {
    // Si el archivo se carga, añádelo a la escena
    const object = gltf.scene;

    // Ajusta la escala del modelo
    const scaleFactor = 120;
    object.scale.set(scaleFactor, scaleFactor, scaleFactor);

    object.position.set(5, 15.5, -3);
    scene.add(object);

    // Ocultar el loader cuando el modelo se carga
    loadingScreen.style.display = 'none';
  },
  function (xhr) {
    // Calcular y mostrar el porcentaje cargado
    const progressPercentage = (xhr.loaded / xhr.total * 100).toFixed(2); // Calcula el porcentaje cargado

    // Mostrar el porcentaje en la consola
    console.log(`Cargando: ${progressPercentage}%`);

    // Actualizar el círculo de carga
    drawLoadingCircle(progressPercentage);
  },
  function (error) {
    console.error(error);
    // Ocultar el loader en caso de error
    loadingScreen.style.display = 'none';
  }
);

// Instancia un nuevo renderizador y establece su tamaño
const renderer = new THREE.WebGLRenderer({ alpha: true });
renderer.setSize(window.innerWidth, window.innerHeight);

// Añade el renderizador al DOM
document.getElementById("container3D").appendChild(renderer.domElement);

// Añade luces a la escena
const topLight = new THREE.DirectionalLight(0xffffff, 1);
topLight.position.set(500, 500, 500);
scene.add(topLight);

const ambientLight = new THREE.AmbientLight(0x333333, 1);
scene.add(ambientLight);

// Controlador para simular una persona en primera persona
const controls = new PointerLockControls(cameraFP, renderer.domElement);

// Al hacer clic, el puntero se bloqueará y podremos movernos (solo en primera persona)
document.addEventListener('click', () => {
  controls.lock(); // Bloquea el ratón solo si estamos en la cámara en primera persona
});

// Movimiento de la "personita" con teclas WASD
const velocity = new THREE.Vector3();
const direction = new THREE.Vector3();
const moveSpeed = 11.0;  // Velocidad de movimiento

const keys = {
  forward: false,
  backward: false,
  left: false,
  right: false
};

document.addEventListener('keydown', (event) => {
  switch (event.code) {
    case 'KeyW': keys.forward = true; break;
    case 'KeyS': keys.backward = true; break;
    case 'KeyA': keys.left = true; break;
    case 'KeyD': keys.right = true; break;
  }
});

document.addEventListener('keyup', (event) => {
  switch (event.code) {
    case 'KeyW': keys.forward = false; break;
    case 'KeyS': keys.backward = false; break;
    case 'KeyA': keys.left = false; break;
    case 'KeyD': keys.right = false; break;
  }
});

// Renderiza la escena y controla el movimiento de la "personita"
function animate() {
  requestAnimationFrame(animate);
  
  // Actualiza la velocidad de movimiento solo en primera persona
  if (controls.isLocked && activeCamera === cameraFP) {
    direction.z = Number(keys.forward) - Number(keys.backward);
    direction.x = Number(keys.right) - Number(keys.left);
    direction.normalize(); // Asegura que el movimiento no sea más rápido en diagonal

    velocity.x -= velocity.x * 10.0 * 0.1;
    velocity.z -= velocity.z * 10.0 * 0.1;

    if (keys.forward || keys.backward) velocity.z -= direction.z * moveSpeed * 0.1;
    if (keys.left || keys.right) velocity.x -= direction.x * moveSpeed * 0.1;

    // Mueve la cámara según la dirección y velocidad calculada
    controls.moveRight(-velocity.x);
    controls.moveForward(-velocity.z);
  }
  
  renderer.render(scene, activeCamera);
}

// Inicia el renderizado
animate();
