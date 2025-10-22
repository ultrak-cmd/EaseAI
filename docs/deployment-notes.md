# Deployment Options Overview

## Git-Based PHP Hosting with Free Tiers
- **Render (Free Web Service)** – Native PHP runtime with automatic deploys from Git pushes; containers sleep after inactivity but spin up on demand.
- **Northflank (Starter Tier)** – Container-based platform with GitHub/GitLab integration; supports Docker or Nixpacks builds so PHP apps can deploy without custom infrastructure.
- **Railway (Developer Plan)** – Provides limited monthly credits and Git-based auto-deploys; PHP runs inside containers using the platform's buildpacks or Dockerfiles.

## Render Free Tier Considerations for PHP
- Free services receive **512 MB RAM and 0.1 vCPU**, which is sufficient for lightweight marketing sites but restrictive for heavier workloads.
- Instances **spin down after 15 minutes of inactivity**, introducing a brief cold start when traffic resumes.
- No persistent disk is included; any files written to the container filesystem are lost on restarts, so external storage is required for durable data beyond lightweight logs.

## Downsides of `vercel-php`
- The PHP runtime is **community-maintained**, so support for extensions and updates can lag behind official releases.
- Running PHP on Vercel's serverless platform often incurs **cold-start latency**, especially for infrequent traffic.
- File writes land on ephemeral storage, meaning **stateful features (logs, uploads)** require external storage services to persist.
