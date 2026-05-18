-- Migration 002: Add locale column to projects table
ALTER TABLE projects ADD COLUMN locale TEXT NOT NULL DEFAULT 'en' CHECK (locale IN ('en', 'ar'));
