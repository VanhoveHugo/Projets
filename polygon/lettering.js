const canvas = document.querySelector('.header');
const ctx = canvas.getContext('2d');
canvas.width = window.innerWidth;
canvas.height = 500;
let particles = [];
let ajustX = 10;
let ajustY = 10;

const mouse = {
    x: null,
    y: null,
    radius: 100
}

window.addEventListener('mousemove', (e) => {
    mouse.x = e.x;
    mouse.y = e.y;
})

ctx.fillStyle = 'white';
ctx.font = '22px Arial';
ctx.fillText('Polygon', 20, 20);
const textCoordinates = ctx.getImageData(0, 0, 100, 100);

class Particle {
    constructor(x, y) {
        this.x = x;
        this.y = y;
        this.size = 2;
        this.originX = this.x;
        this.originY = this.y;
        this.density = (Math.random() * 30) + 1;
    }
    draw() {
        ctx.fillStyle = 'white';
        ctx.beginPath();
        ctx.arc(this.x, this.y, this.size,0 , Math.PI * 2);
        ctx.closePath();
        ctx.fill();
    }

    update() {
        let x = mouse.x - this.x;
        let y = mouse.y - this.y;
        let dist = Math.sqrt(x * x + y * y);
        let fDirX = x / dist;
        let fDirY = y / dist;
        let maxDist = mouse.radius;
        let force = (maxDist - dist) / maxDist;
        let dirX = fDirX * force * this.density;
        let dirY = fDirY * force * this.density;
        

        if(dist < mouse.radius) {
            this.x -= dirX;
            this.y -= dirY;            
        } else {
            if(this.x !== this.originX) {
                let x = this.x - this.originX;
                this.x -= x/10;
            }
            if(this.y !== this.originY) {
                let y = this.y - this.originY;
                this.y -= y/10;
            }
        }
    }
    
}

function init() {
    particles = [];
    for(let y=0, sy = textCoordinates.height; y<sy; y++) {
        for(let x=0, sx = textCoordinates.width; x<sx; x++) {
            if(textCoordinates.data[(y * 4 * textCoordinates.width) + (x * 4) + 3] > 120) {
                let posX = x + ajustX;
                let posY = y + ajustY;
                particles.push(new Particle(posX * 15, posY * 15))
            }
        }  
    }
}

init()

function animate() {
    ctx.clearRect(0, 0, canvas.width, canvas.height);
    for(let i=0; i<particles.length; i++) {
        particles[i].draw();
        particles[i].update();
    }
    connect();
    requestAnimationFrame(animate);
}
animate()

function connect() {
    for(let a =0; a<particles.length; a++) {
        for(let b =0; b<particles.length; b++) {
            let x = particles[a].x - particles[b].x;
            let y = particles[a].y - particles[b].y;
            let dist = Math.sqrt(x * x + y * y);

            if(dist < 20) {
                ctx.strokeStyle = 'white';
                ctx.lineWidth = 2;
                ctx.beginPath();
                ctx.moveTo(particles[a].x, particles[a].y);
                ctx.lineTo(particles[b].x, particles[b].y);
                ctx.stroke();
            }
        }
    }
}