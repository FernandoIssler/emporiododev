function confettiShow() {

    let endConfetti = Date.now() + (2 * 1000);
    (function startConfetti() {
        confetti({
            particleCount: 2,
            angle: 60,
            spread: 55,
            ticks: 800,
            origin: {x: 0},
            colors: ['#44c438', '#efb500']
        });
        confetti({
            particleCount: 2,
            angle: 120,
            spread: 55,
            ticks: 800,
            origin: {x: 1},
            colors: ['#44c438', '#efb500']
        });

        if (Date.now() < endConfetti) {
            requestAnimationFrame(startConfetti);
        }
    }());
}