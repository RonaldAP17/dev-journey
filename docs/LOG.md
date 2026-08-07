# Daily log

One entry per day. The **"What I didn't get"** line is the agenda for the weekly review — it's the most valuable line, so it never stays empty.

## Entry template

```
### Day N — YYYY-MM-DD — <topic>
- What I did:
- Commit:
- What I didn't get (weekly-review agenda):
- Skipped? (yes/no + why):
```

---

### Day 1 — 2026-08-06 — PHP: associative arrays + foreach + echo
- What I did: Built an associative array of products (`name => price`), looped it with `foreach`, printed each as an HTML `<li>`. Written first, without AI.
- Commit: `First exercise: php arrays + forEach concepts`
- What I didn't get: A `;` placed right after `foreach(...)` silently made the loop body empty, so only the last item printed. Learned that a control-structure body lives inside `{ }`, and that a bare `;` ends a statement — which is why `};` after a block is redundant.
- Skipped? no
