<?php

include 'config.php';

print_r($database->info());

// Create Users Table in Database
$database->create("users", [
    "id" => [
        "INT",
        "NOT NULL",
        "AUTO_INCREMENT",
        "PRIMARY KEY"
    ],
    "username" => [
        "VARCHAR(50)",
        "NOT NULL"
    ],
    "password" => [
        "VARCHAR(50)",
        "NOT NULL"
    ],
    "email" => [
        "VARCHAR(50)",
        "NOT NULL"
    ],
    'display_name' => [
        "VARCHAR(50)",
        "NOT NULL"
    ],
    'bio' => [
        "TEXT",
        "NOT NULL"
    ],
    "created_at" => [
        "DATETIME",
        "NOT NULL",
        "DEFAULT CURRENT_TIMESTAMP"
    ],
    "updated_at" => [
        "DATETIME",
        "NOT NULL",
        "DEFAULT CURRENT_TIMESTAMP"
    ]
]);

// Create Categories Table in Database
$database->create("categories", [
    "id" => [
        "INT",
        "NOT NULL",
        "AUTO_INCREMENT",
        "PRIMARY KEY"
    ],
    "name" => [
        "VARCHAR(50)",
        "NOT NULL"
    ],
    'parent_id' => [
        "INT",
        "NOT NULL"
    ],
    "description" => [
        "TEXT",
        "NOT NULL"
    ],
    'slug' => [
        "VARCHAR(100)",
        "NOT NULL"
    ]
]);

// Create Tags Table in Database
$database->create("tags", [
    "id" => [
        "INT",
        "NOT NULL",
        "AUTO_INCREMENT",
        "PRIMARY KEY"
    ],
    "name" => [
        "VARCHAR(50)",
        "NOT NULL"
    ],
    "description" => [
        "TEXT",
        "NOT NULL"
    ]
]);

// Create Technologies Table in Database
$database->create("technologies", [
    "id" => [
        "INT",
        "NOT NULL",
        "AUTO_INCREMENT",
        "PRIMARY KEY"
    ],
    "name" => [
        "VARCHAR(50)",
        "NOT NULL"
    ]
]);

// Create Category to Technology Mapping Table in Database
$database->create("category_technology", [
    "id" => [
        "INT",
        "NOT NULL",
        "AUTO_INCREMENT",
        "PRIMARY KEY"
    ],
    "category_id" => [
        "INT",
        "NOT NULL"
    ],
    "technology_id" => [
        "INT",
        "NOT NULL"
    ]
]);

// Create Posts Table in Database
$database->create("posts", [
    "id" => [
        "INT",
        "NOT NULL",
        "AUTO_INCREMENT",
        "PRIMARY KEY"
    ],
    "title" => [
        "VARCHAR(100)",
        "NOT NULL"
    ],
    "content" => [
        "TEXT",
        "NOT NULL"
    ],
    "user_id" => [
        "INT",
        "NOT NULL"
    ],
    "category_id" => [
        "INT",
        "NOT NULL"
    ],
    "secondary_categories" => [
        "VARCHAR(50)"
    ],
    "tags" => [
        "VARCHAR(50)"
    ],
    'meta_title' => [
        "VARCHAR(50)"
    ],
    'meta_description' => [
        "TEXT"
    ],
    'meta_keywords' => [
        "VARCHAR(150)"
    ],
    "created_at" => [
        "DATETIME",
        "NOT NULL",
        "DEFAULT CURRENT_TIMESTAMP"
    ],
    "updated_at" => [
        "DATETIME",
        "NOT NULL",
        "DEFAULT CURRENT_TIMESTAMP"
    ],
    'slug' => [
        "VARCHAR(100)",
        "NOT NULL"
    ]
]);

// Create Comments Table in Database
$database->create("comments", [
    "id" => [
        "INT",
        "NOT NULL",
        "AUTO_INCREMENT",
        "PRIMARY KEY"
    ],
    "content" => [
        "TEXT",
        "NOT NULL"
    ],
    "user_id" => [
        "INT"
    ],
    "user_email" => [
        "VARCHAR(50)"
    ],
    "user_display_name" => [
        "VARCHAR(50)"
    ],
    "post_id" => [
        "INT",
        "NOT NULL"
    ],
    "is_reply_to" => [
        "INT"
    ],
    "created_at" => [
        "DATETIME",
        "NOT NULL",
        "DEFAULT CURRENT_TIMESTAMP"
    ],
    "updated_at" => [
        "DATETIME",
        "NOT NULL",
        "DEFAULT CURRENT_TIMESTAMP"
    ]
]);

// Create Likes Table in Database
$database->create("likes", [
    "id" => [
        "INT",
        "NOT NULL",
        "AUTO_INCREMENT",
        "PRIMARY KEY"
    ],
    "post_id" => [
        "INT",
        "NOT NULL"
    ],
    "count" => [
        "INT",
        "NOT NULL"
    ]
]);
