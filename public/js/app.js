document.addEventListener('DOMContentLoaded', () => {
    const logoContainer = document.getElementById('logo3d');
    if (!logoContainer) return;

    console.log("Logo 3D : chemin du fichier →", logoContainer.dataset.logo);

    const scene = new THREE.Scene();
    const camera = new THREE.PerspectiveCamera(75, 1, 0.1, 1000);
    const renderer = new THREE.WebGLRenderer({ antialias: true, alpha: true });
    logoContainer.appendChild(renderer.domElement);

    const light = new THREE.AmbientLight(0xffffff, 1);
    scene.add(light);

    const loader = new THREE.GLTFLoader();
    loader.load(logoContainer.dataset.logo, function(gltf) {
        scene.add(gltf.scene);
        gltf.scene.rotation.y = Math.PI;
    }, undefined, function(error) {
        console.error("Erreur lors du chargement du logo GLB :", error);
    });

    camera.position.z = 5;

    function resizeRenderer() {
        const width = logoContainer.clientWidth;
        const height = logoContainer.clientHeight;
        renderer.setSize(width, height);
        camera.aspect = width / height;
        camera.updateProjectionMatrix();
    }

    window.addEventListener('resize', resizeRenderer);
    resizeRenderer();

    function animate() {
        requestAnimationFrame(animate);
        scene.children.forEach(child => {
            if (child.type === "Group") child.rotation.y += 0.01;
        });
        renderer.render(scene, camera);
    }
    animate();
});
