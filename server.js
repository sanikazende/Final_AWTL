// server.js

const express = require('express');
const app = express();
const PORT = process.env.PORT || 3000;

// Dummy data for demonstration
const posts = [
    { id: 1, title: 'Lorem Ipsum', body: 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.' },
    { id: 2, title: 'Dolor Sit Amet', body: 'Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.' },
    { id: 3, title: 'Consectetur Adipiscing', body: 'Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris.' },
    // Add more dummy data as needed
];

// Search endpoint
app.get('/search', (req, res) => {
    const query = req.query.q.toLowerCase();
    const results = posts.filter(post =>
        post.title.toLowerCase().includes(query) ||
        post.body.toLowerCase().includes(query)
    );
    res.json(results);
});

// Start server
app.listen(PORT, () => {
    console.log(`Server is running on port ${PORT}`);
});