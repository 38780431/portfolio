<?php
// portfolio.php
$pageTitle = "My Portfolio";
require_once 'includes/header.php';
require_once 'includes/auth_functions.php';

redirectIfNotLoggedIn();

// Sample portfolio data (in a real app, you might fetch this from a database)
$projects = [
    [
        'title' => 'E-Commerce Website',
        'description' => 'A fully responsive e-commerce platform with product filtering and cart functionality.',
        'technologies' => ['HTML5', 'CSS3', 'JavaScript', 'PHP', 'MySQL'],
        'image' => '/assets/images/project1.jpg',
        'link' => '#'
    ],
    [
        'title' => 'Task Management App',
        'description' => 'A productivity application for managing tasks with drag-and-drop functionality.',
        'technologies' => ['React', 'Node.js', 'MongoDB'],
        'image' => '/assets/images/project2.jpg',
        'link' => '#'
    ],
    [
        'title' => 'Weather Dashboard',
        'description' => 'Real-time weather information with 5-day forecast using a weather API.',
        'technologies' => ['JavaScript', 'API Integration', 'Bootstrap'],
        'image' => '/assets/images/project3.jpg',
        'link' => '#'
    ]
];

$skills = [
    'Frontend' => ['HTML5', 'CSS3', 'JavaScript', 'React', 'Vue.js'],
    'Backend' => ['PHP', 'Node.js', 'Python'],
    'Database' => ['MySQL', 'MongoDB'],
    'Tools' => ['Git', 'Docker', 'VS Code', 'Figma']
];
?>

<section class="hero">
    <div class="hero-content">
        <h1 class="name">JAPHETH RALPH NYADWERA</h1>
        <h2 class="title">Front-end Developer Expert</h2>
        <p class="bio">
            Enthusiastic and detailed-oriented web Developer currently
            pursuing a degree in Information and Communication Technology at
            Maseno University. Skilled in front-end and back-end Technologies
            such as HTML, CSS, JavaScript, PHP, and MYSQL. Experienced in
            building responsive websites and dynamic web applications with a
            focus on clean code and user-friendly design. Passionate about
            continuous learning and developing innovative solutions to
            real-world problems.
        </p>
        <a href="JAPHETH RALPH. CV.pdf" download class="cv-button">Download CV</a>
    </div>
    <div class="profile-image-container">
        <img src="/assets/images/profile.jpg" alt="Japheth Ralph Nyadwera">
    </div>
</section>

<section id="about" class="section">
    <div class="container">
        <h2 class="section-title">About Me</h2>
        <div class="about-content">
            <div class="about-text">
                <p>I'm a passionate web developer with expertise in creating modern, responsive websites and web applications. My journey in web development began at Maseno University where I'm currently pursuing my degree in Information and Communication Technology.</p>
                <p>When I'm not coding, you can find me contributing to open-source projects, learning new technologies, or mentoring aspiring developers.</p>
            </div>
            <div class="skills">
                <?php foreach ($skills as $category => $items): ?>
                    <div class="skill-category">
                        <h3><?php echo htmlspecialchars($category); ?></h3>
                        <ul>
                            <?php foreach ($items as $skill): ?>
                                <li><?php echo htmlspecialchars($skill); ?></li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</section>

<section id="portfolio" class="section">
    <div class="container">
        <h2 class="section-title">My Projects</h2>
        <div class="projects-grid">
            <?php foreach ($projects as $project): ?>
                <div class="project-card">
                    <div class="project-image">
                        <img src="<?php echo htmlspecialchars($project['image']); ?>" alt="<?php echo htmlspecialchars($project['title']); ?>">
                    </div>
                    <div class="project-content">
                        <h3><?php echo htmlspecialchars($project['title']); ?></h3>
                        <p><?php echo htmlspecialchars($project['description']); ?></p>
                        <div class="technologies">
                            <?php foreach ($project['technologies'] as $tech): ?>
                                <span class="tech-tag"><?php echo htmlspecialchars($tech); ?></span>
                            <?php endforeach; ?>
                        </div>
                        <a href="<?php echo htmlspecialchars($project['link']); ?>" class="project-link" target="_blank">View Project</a>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<section id="contact" class="section">
    <div class="container">
        <h2 class="section-title">Get In Touch</h2>
        <div class="contact-content">
            <div class="contact-info">
                <div class="contact-item">
                    <i class='bx bx-envelope'></i>
                    <span>japheth@example.com</span>
                </div>
                <div class="contact-item">
                    <i class='bx bx-phone'></i>
                    <span>+254 7XX XXX XXX</span>
                </div>
                <div class="contact-item">
                    <i class='bx bx-map'></i>
                    <span>Nairobi, Kenya</span>
                </div>
            </div>
            <form id="contactForm" class="contact-form">
                <div class="form-group">
                    <input type="text" name="name" placeholder="Your Name" required>
                </div>
                <div class="form-group">
                    <input type="email" name="email" placeholder="Your Email" required>
                </div>
                <div class="form-group">
                    <input type="text" name="subject" placeholder="Subject" required>
                </div>
                <div class="form-group">
                    <textarea name="message" placeholder="Your Message" required></textarea>
                </div>
                <button type="submit" class="submit-btn">Send Message</button>
            </form>
        </div>
    </div>
</section>

<script>
    // Contact form handling
    document.getElementById('contactForm').addEventListener('submit', function(e) {
        e.preventDefault();

        const formData = new FormData(this);

        fetch('send_email.php', {
                method: 'POST',
                body: formData
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    alert('Message sent successfully!');
                    this.reset();
                } else {
                    alert('Error: ' + (data.message || 'Failed to send message'));
                }
            })
            .catch(error => {
                alert('An error occurred. Please try again.');
                console.error('Error:', error);
            });
    });
</script>

<?php require_once 'includes/footer.php'; ?>