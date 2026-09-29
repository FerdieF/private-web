<?php

namespace Database\Seeders;

use App\Models\Certification;
use App\Models\Experience;
use App\Models\Project;
use App\Models\Skill;
use Illuminate\Database\Seeder;

class PortfolioSeeder extends Seeder
{
    /**
     * Content is static portfolio data; the seeder wipes and re-inserts so it
     * is safe to run on every container start.
     */
    public function run(): void
    {
        Skill::query()->delete();
        Experience::query()->delete();
        Project::query()->delete();
        Certification::query()->delete();

        $this->seedSkills();
        $this->seedExperiences();
        $this->seedProjects();
        $this->seedCertifications();
    }

    private function seedSkills(): void
    {
        $skills = [
            [
                'category' => 'Programming Languages',
                'items' => ['PHP (Laravel)', 'Python', 'SQL (PostgreSQL, MySQL)', 'Java (Basic)', 'Golang (Basic)'],
            ],
            [
                'category' => 'Backend & Web Services',
                'items' => ['RESTful APIs', 'JSON', 'Web Services', 'Spring Boot'],
            ],
            [
                'category' => 'Data Engineering',
                'items' => ['ETL Pipelines', 'Pandas', 'SQLAlchemy', 'Data Modeling', 'SQL Analytics'],
            ],
            [
                'category' => 'Databases & Tools',
                'items' => ['PostgreSQL', 'MySQL', 'Docker', 'Git', 'GitHub', 'Postman'],
            ],
            [
                'category' => 'Networking',
                'items' => ['VLAN', 'Subnetting', 'Static Routing', 'Router-on-a-Stick', 'DHCP', 'DNS', '802.1Q Trunking', 'ACL (Access Control Lists)', 'TCP/IP', 'ARP', 'ICMP'],
            ],
            [
                'category' => 'Cybersecurity & Monitoring',
                'items' => ['Suricata (IDS)', 'Wireshark', 'tcpdump', 'Nmap', 'Packet Analysis', 'Network Signatures', 'Firewall Rules', 'VirtualBox Homelab'],
            ],
            [
                'category' => 'Methodologies & Concepts',
                'items' => ['SDLC', 'OOP', 'Data Structures & Algorithms', 'Agile/Scrum'],
            ],
            [
                'category' => 'Currently Learning',
                'items' => ['Active Directory', 'AWS Cloud Networking', 'Terraform', 'CI/CD Pipelines', 'React/Next.js', 'Kubernetes'],
            ],
        ];

        foreach ($skills as $i => $skill) {
            Skill::create([...$skill, 'sort_order' => $i]);
        }
    }

    private function seedExperiences(): void
    {
        $experiences = [
            [
                'company' => 'PT Perkebunan Nusantara IV Regional 1',
                'role' => 'Full-stack Web Developer Intern — Learning & Development',
                'period' => 'Dec 2025 – Jun 2026',
                'highlights' => [
                    'Built and maintained backend features for an internal performance-assessment platform using Laravel, including clean database schemas and RESTful APIs for centralized reporting.',
                    'Designed database structures to track risk indicators and performance metrics, keeping the data layer reliable as reporting needs grew across teams.',
                    'Worked directly with department stakeholders to translate reporting requirements into working backend features, diagnosing and resolving issues along the way.',
                ],
            ],
            [
                'company' => 'Pelindo Multi Terminal',
                'role' => 'IT Support Intern',
                'period' => 'Mar 2024 – Jun 2024',
                'highlights' => [
                    'Supported hardware and software troubleshooting and monitored network activity to help maintain smooth daily operations.',
                    'Diagnosed hardware and network issues and translated technical findings into clear guidance for non-technical staff.',
                ],
            ],
        ];

        foreach ($experiences as $i => $experience) {
            Experience::create([...$experience, 'sort_order' => $i]);
        }
    }

    private function seedProjects(): void
    {
        $projects = [
            [
                'title' => 'Employee Data Management Application',
                'project_type' => 'Internship Business Application',
                'role' => 'Fullstack Developer',
                'period' => 'Jan 2026 – Mar 2026',
                'summary' => 'Internal application built with Laravel Filament and PostgreSQL to manage employee records, assessment-related data, and supporting internal data-input processes in a structured, efficient way.',
                'highlights' => [
                    'Data-driven dashboard performing real-time aggregation of assessment results — total records, activities, and participant summaries — straight from PostgreSQL.',
                    'Comprehensive CRUD system for employee master data, with database normalization and validation keeping NRK, unit, and position fields consistent.',
                    'Automated data validation and RESTful endpoints, with tests covering critical data-entry workflows to catch errors before production.',
                ],
                'tech_stack' => ['Laravel', 'Filament', 'PostgreSQL', 'REST API'],
            ],
            [
                'title' => 'IT Department Tracer Study',
                'project_type' => 'Final Project (Academic)',
                'role' => 'Fullstack Developer',
                'period' => 'Jan – May 2025',
                'summary' => 'Web-based tracer study platform that stores alumni data, provides efficient search, and supports monitoring of graduates\' career information for institutional reporting.',
                'highlights' => [
                    'Centralized alumni database with optimized search logic achieving 0.6-second query execution across 450+ records.',
                    'Normalized database schema maintaining data integrity across complex career-history records.',
                    'Dynamic data fetching feeding interactive dashboard visualizations with real-time reporting from the backend database.',
                    'Automated data collection pipeline built with Python, Selenium, and BeautifulSoup to capture and process alumni tracking data.',
                ],
                'tech_stack' => ['Python', 'Selenium', 'BeautifulSoup', 'SQL'],
            ],
            [
                'title' => 'Indonesia Education ETL Pipeline',
                'project_type' => 'Personal Portfolio Project',
                'role' => 'Data Engineer',
                'period' => '2025',
                'summary' => 'Automated ETL pipeline that extracts APS education data from the BPS Web API, transforms it with Pandas, and loads it into a Dockerized PostgreSQL database via SQLAlchemy for analytical querying.',
                'highlights' => [
                    'Idempotent upsert logic keeps re-runs safe and the dataset consistent — a production-minded approach to data integrity.',
                    'Five analytical SQL queries using window functions (RANK, LAG) for provincial rankings and dropout-gap analysis.',
                    'Revealed a participation drop of up to 35.77% between junior high (APS 13–15) and senior high (APS 16–18) — sharpest in Bengkulu — turning raw data into a finding policymakers can act on.',
                ],
                'tech_stack' => ['Python', 'Pandas', 'PostgreSQL', 'SQLAlchemy', 'Docker'],
            ],
            [
                'title' => 'Networking Homelab — VLAN, Routing & Network Services',
                'project_type' => 'Personal Homelab / Self-Learning Project',
                'role' => 'Network Engineer',
                'period' => '2026',
                'summary' => 'Hands-on networking lab built with Cisco Packet Tracer and VirtualBox to practice enterprise networking concepts including VLAN segmentation, inter-VLAN routing, DHCP, DNS, subnetting, and ACL-based security policies.',
                'repository_url' => 'https://github.com/FerdieF/enterprise-network-simulation',
                'highlights' => [
                    'Designed and configured a multi-VLAN network (Users, Servers, Guest) with 802.1Q trunking and Router-on-a-Stick for inter-VLAN routing across three subnets.',
                    'Implemented DHCP pools per VLAN with exclusion ranges and DNS integration, enabling automatic IP assignment and hostname resolution (server.local → 192.168.20.10).',
                    'Built ACL policies to enforce network segmentation — Guest VLAN blocked from accessing Users and Servers while retaining gateway connectivity.',
                    'Configured multi-router static routing across three networks (192.168.10.0/24, 192.168.20.0/24, 192.168.30.0/24), proving end-to-end connectivity with next-hop routing.',
                    'Documented each lab with topology diagrams, troubleshooting steps, and lessons learned following a structured approach from Layer 1 through Layer 7.',
                ],
                'tech_stack' => ['Cisco Packet Tracer', 'VirtualBox', 'VLAN', '802.1Q', 'DHCP', 'DNS', 'ACL', 'Static Routing'],
            ],
            [
                'title' => 'IDS & Network Monitoring Lab — Suricata, Wireshark & Nmap',
                'project_type' => 'Personal Homelab / Self-Learning Project',
                'role' => 'Security Analyst',
                'period' => '2026',
                'summary' => 'Cybersecurity monitoring lab using Kali Linux and Windows 11 VMs in a Host-Only network. Focused on packet capture, protocol analysis, intrusion detection with Suricata, and port scanning with Nmap to build real-world SOC analyst skills.',
                'highlights' => [
                    'Captured and analyzed ARP, ICMP, and TCP traffic using tcpdump and Wireshark, tracing packet flow from Layer 2 (Ethernet/MAC) through Layer 3 (IP) to Layer 4 (TCP/ICMP).',
                    'Performed TCP Connect Scan (nmap -Pn -sT) against Windows target and analyzed SYN/SYN-ACK/RST handshake patterns in Wireshark to determine open vs closed vs filtered ports.',
                    'Deployed Suricata as an IDS on Kali Linux, loaded 52,995 ET Open rules, and correlated alerts with Wireshark captures — successfully investigated a DHCP hostname leak (ET INFO Possible Kali Linux hostname).',
                    'Practiced full SOC investigation workflow: Alert → Identify source/destination → Understand protocol → Analyze packet payload → Form hypothesis → Verify → Determine if behavior is normal or suspicious.',
                    'Documented firewall troubleshooting — diagnosed Windows Firewall blocking inbound ICMP and created a targeted rule (ICMPv4 Echo Request inbound) instead of disabling the firewall entirely.',
                ],
                'tech_stack' => ['Kali Linux', 'Suricata', 'Wireshark', 'tcpdump', 'Nmap', 'VirtualBox', 'Windows Firewall'],
            ],
        ];

        foreach ($projects as $i => $project) {
            Project::create([...$project, 'sort_order' => $i]);
        }
    }

    private function seedCertifications(): void
    {
        $certifications = [
            [
                'name' => 'Pre Security Learning Path',
                'issuer' => 'TryHackMe — June 2026',
                'credential_url' => '/certificates/thm-pre-security.pdf',
            ],
            [
                'name' => 'Introduction to Data Science in Python',
                'issuer' => 'Coursera',
                'credential_url' => '/certificates/coursera-data-science-python.pdf',
            ],
            [
                'name' => 'Introduction to Business Analytics',
                'issuer' => 'Coursera',
                'credential_url' => '/certificates/coursera-business-analytics.pdf',
            ],
            [
                'name' => 'GE-EPT English Proficiency — Score 603',
                'issuer' => 'Universitas Sumatera Utara',
                'credential_url' => '/certificates/geept.pdf',
            ],
        ];

        foreach ($certifications as $i => $certification) {
            Certification::create([...$certification, 'sort_order' => $i]);
        }
    }
}
