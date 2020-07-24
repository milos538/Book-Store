<?php
    final class Configuration{
        const DATABASE_HOST = "localhost";
        const DATABASE_USER = "root";
        const DATABASE_PASSWORD = "";
        const DATABASE_NAME = "books";

        const SESSION_STORAGE = '\\App\\Core\\Session\\FileSessionStorage';
        const SESSION_STORAGE_DATA = ['./sessions/ '];    }