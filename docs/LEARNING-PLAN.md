# Learning plan

A guided, in-public path from CMS / e-commerce development into strong software fundamentals. Small daily reps, reviewed and reflected on — building the depth a page-builder résumé doesn't show.

## Method
- **30 minutes a day, minimum.** The plan is built around the floor, not the ceiling — consistency before curriculum.
- **Produce first, review after.** I write each exercise on my own, without AI. Only once I've worked through it do I bring it to review and dig into the *why*.
- **One small commit a day.** The streak is the point; this repo is the record.
- **Skip is not quitting.** If I already know something cold, I skip it and level up.
- **Weekly review.** ~20 minutes looking back — what clicked, what didn't.

## Roadmap

### Block 1 — PHP → WordPress / Kirby  *(current)*
PHP is the shared substrate of both WordPress and Kirby, so one investment unlocks both. Goal: own template internals — variables, arrays, `foreach`, embedding PHP in HTML — then apply them to hooks (`add_action` / `add_filter`), custom post types (`register_post_type`), and ACF (`get_field`). PHP never floats abstract; it always lands on real templating.

### Block 2 — JavaScript → React  *(later)*
Core JS fundamentals first (array methods, promises / async, the DOM), then React. Weak JS is building on sand, so this waits until Block 1 has traction.

## Where things live
- **`docs/LEARNING-PLAN.md`** — this file: the why, the method, the roadmap.
- **`docs/LOG.md`** — the daily log, one entry per day.
- **`01-php-wp/`**, `02-js-react/` — the code, one small file per exercise.

This repo is the single source of truth for the project.
