-- Migration 003: Add locale column to timeline, volunteering, and languages tables
ALTER TABLE timeline ADD COLUMN locale TEXT NOT NULL DEFAULT 'en' CHECK (locale IN ('en', 'ar'));
ALTER TABLE volunteering ADD COLUMN locale TEXT NOT NULL DEFAULT 'en' CHECK (locale IN ('en', 'ar'));
ALTER TABLE languages ADD COLUMN locale TEXT NOT NULL DEFAULT 'en' CHECK (locale IN ('en', 'ar'));
