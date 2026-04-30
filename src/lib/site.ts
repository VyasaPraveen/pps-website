export const SITE = {
  name: "Pragathi Power Solutions",
  shortName: "PPS",
  tagline: "Power from Sun to Power Everyone",
  taglineHindi: "Ghar Ghar mei Suraj ki Shakti",
  founded: "December 2012",
  yearsInBusiness: new Date().getFullYear() - 2012,
  designation: "Authorised TATA Power Solar Partners in Rayalaseema",
  city: "Tirupati",
  region: "Rayalaseema, Andhra Pradesh",
  address: "Ramanujam Circle, Tirupati, 517501",
  phone: "+91 9701426440",
  phoneHref: "tel:+919701426440",
  email: "ppstirupati@gmail.com",
  whatsapp: "https://wa.link/r70puj",
  whatsappRaw: "https://wa.me/919701426440",
  url: "https://pragathipowersolutions.com",
  founders: [
    { name: "K. Chandra Sekhar", role: "Co-Founder & Director" },
    { name: "Balaji Kiran Gilledu", role: "Co-Founder & Director" },
  ],
  social: {
    instagram: "https://instagram.com/pragathi_power_solutions",
    facebook: "https://facebook.com/PragathiPowerSolutions",
    youtube: "https://youtube.com/@PragathiPowerSolutionsOfficial",
    linkedin: "https://www.linkedin.com/company/pragathi-power-solutions",
  },
} as const;

export const NAV_LINKS = [
  { href: "/", label: "Home" },
  { href: "/about", label: "About" },
  { href: "/services", label: "Services" },
  { href: "/projects", label: "Projects" },
  { href: "/gallery", label: "Gallery" },
  { href: "/contact", label: "Contact" },
] as const;

export type Service = {
  slug: string;
  title: string;
  short: string;
  description: string;
  icon: "panel" | "thermal" | "streetlight" | "fence" | "pump" | "amc";
  highlights: string[];
};

export const SERVICES: Service[] = [
  {
    slug: "rooftop",
    title: "Solar Rooftop Systems",
    short: "On-grid power plants for homes and businesses.",
    description:
      "Rooftop on-grid systems generate electricity whenever the utility grid is available, slashing your monthly bills and feeding excess power back to the grid through net metering.",
    icon: "panel",
    highlights: [
      "On-grid, off-grid and hybrid configurations",
      "Net metering with state DISCOM",
      "PM Surya Ghar subsidy assistance",
      "TATA Power Solar premium panels",
    ],
  },
  {
    slug: "thermal",
    title: "Solar Thermal & Hot Water",
    short: "Reliable hot water for homes, hotels and industry.",
    description:
      "Evacuated tube and flat-plate solar water heaters that deliver hot water round the year. The smart choice for households, hotels, hospitals and industrial process heating.",
    icon: "thermal",
    highlights: [
      "100 to 5,000 litres per day capacity",
      "Pressurised and non-pressurised models",
      "BIS-certified collectors",
      "Cuts geyser power use to near zero",
    ],
  },
  {
    slug: "street-lights",
    title: "Solar Street Lights",
    short: "All-in-one lighting powered entirely by sunlight.",
    description:
      "Integrated solar street lights with motion sensors, lithium batteries and high-lumen LEDs. Perfect for streets, campuses, gated communities and rural electrification projects.",
    icon: "streetlight",
    highlights: [
      "12W to 60W integrated luminaires",
      "Auto dusk-to-dawn operation",
      "Lithium-ion storage, 5+ year life",
      "Zero electricity bills",
    ],
  },
  {
    slug: "fence",
    title: "Solar Fencing",
    short: "Solar-powered electric fences for farms and estates.",
    description:
      "Pulse-based electric fencing systems powered by solar PV. A non-lethal, low-maintenance perimeter for farmland, plantations, poultry units and warehouses.",
    icon: "fence",
    highlights: [
      "Solar-charged energiser",
      "Up to 10 km perimeter on a single charger",
      "Audible alarm and battery backup",
      "Crop and livestock protection",
    ],
  },
  {
    slug: "pumps",
    title: "Solar Pumpsets",
    short: "Diesel-free water pumping for agriculture.",
    description:
      "Surface and submersible solar pumpsets from 1 HP to 10 HP, eligible under PM-KUSUM. Run irrigation, drinking water and dairy operations on free sunlight.",
    icon: "pump",
    highlights: [
      "AC and DC pump configurations",
      "MNRE-approved controllers",
      "PM-KUSUM scheme assistance",
      "5-year manufacturer warranty",
    ],
  },
  {
    slug: "amc",
    title: "Operation & Maintenance (AMC)",
    short: "Annual care to keep your plant generating at peak.",
    description:
      "Comprehensive AMC packages include scheduled cleaning, performance audits, inverter health checks and priority breakdown response so your investment keeps paying back year after year.",
    icon: "amc",
    highlights: [
      "Quarterly preventive maintenance",
      "Performance ratio monitoring",
      "24x7 priority support",
      "Spare parts and inverter service",
    ],
  },
];

export type Benefit = {
  title: string;
  description: string;
  icon: "rupee" | "sun" | "leaf" | "wrench" | "battery" | "gift" | "home" | "shield" | "scale" | "rocket" | "mute" | "trending";
};

export const BENEFITS: Benefit[] = [
  { icon: "rupee", title: "Lower Bills", description: "Slash monthly electricity expenses by 70-90% from day one." },
  { icon: "sun", title: "Unlimited Energy", description: "Sunlight is infinite. Tirupati gets 300+ sunny days a year." },
  { icon: "leaf", title: "Clean & Green", description: "Zero emissions. Each kW saves ~1.2 tonnes of CO₂ every year." },
  { icon: "wrench", title: "Easy Care", description: "Just monthly cleaning. No moving parts, no fuel, no fuss." },
  { icon: "battery", title: "Self-Sufficient", description: "Reduce reliance on the grid with battery storage options." },
  { icon: "gift", title: "Govt. Subsidies", description: "Up to ₹78,000 under PM Surya Ghar Muft Bijli Yojana." },
  { icon: "home", title: "Higher Property Value", description: "Solar homes resell for measurably more in Indian metros." },
  { icon: "shield", title: "Continuous Supply", description: "Hybrid systems keep critical loads on during outages." },
  { icon: "scale", title: "Flexible Setup", description: "Scale from a 1 kW home to a megawatt commercial plant." },
  { icon: "rocket", title: "Advanced Tech", description: "Mono-PERC, bifacial and TopCon panels for maximum yield." },
  { icon: "mute", title: "Silent Operation", description: "Generates power in absolute silence. Zero noise pollution." },
  { icon: "trending", title: "Tax Benefits", description: "Accelerated depreciation and GST advantages for businesses." },
];

export type ProcessStep = {
  step: number;
  title: string;
  description: string;
};

export const PROCESS: ProcessStep[] = [
  {
    step: 1,
    title: "Free Consultation",
    description: "Share your bill and roof details. We assess your needs over a call or visit at no cost.",
  },
  {
    step: 2,
    title: "Site Survey & Design",
    description: "Our engineers measure shading, structure load and orientation to design your custom plant.",
  },
  {
    step: 3,
    title: "Professional Installation",
    description: "Certified technicians install panels, inverters and net-meter as per CEIG and DISCOM norms.",
  },
  {
    step: 4,
    title: "Switch On & Save",
    description: "Plant is commissioned and you start generating clean power. We handle subsidy paperwork end-to-end.",
  },
];

export type Stat = {
  value: string;
  label: string;
  suffix?: string;
};

export const STATS: Stat[] = [
  { value: "13", suffix: "+", label: "Years in Solar" },
  { value: "1500", suffix: "+", label: "Happy Households" },
  { value: "5", suffix: "MW+", label: "Installed Capacity" },
  { value: "140", suffix: "+", label: "AMC Contracts" },
];

export type FAQ = {
  q: string;
  a: string;
};

export const FAQS: FAQ[] = [
  {
    q: "How long do solar panels last?",
    a: "Modern panels carry a 25-year linear performance warranty and typically generate for 30+ years. Inverters are replaced once every 10-15 years.",
  },
  {
    q: "How much roof space do I need?",
    a: "A 3 kW system needs about 230-250 sq ft of shadow-free roof. We do a free site survey to confirm what your roof can fit.",
  },
  {
    q: "What does maintenance involve?",
    a: "Just monthly water cleaning of the panels and an annual professional check-up. Our AMC handles everything if you prefer to hand it off.",
  },
  {
    q: "What government subsidy is available?",
    a: "PM Surya Ghar Muft Bijli Yojana offers up to ₹78,000 for residential rooftop installations. We file the entire subsidy application for you.",
  },
  {
    q: "Will it work during a power cut?",
    a: "On-grid systems shut down for safety during outages. Hybrid systems with battery backup keep your essential loads running through power cuts.",
  },
  {
    q: "How quickly do I recover my investment?",
    a: "Most residential customers in Tirupati break even in 4 to 6 years. The remaining 20+ years of generation is essentially free electricity.",
  },
];

export type Project = {
  title: string;
  location: string;
  capacity: string;
  type: "Residential" | "Commercial" | "Institutional" | "Industrial" | "Agricultural";
  year: string;
  blurb: string;
};

export const PROJECTS: Project[] = [
  {
    title: "Residential Rooftop",
    location: "Tirupati, A.P.",
    capacity: "5 kW On-Grid",
    type: "Residential",
    year: "2024",
    blurb: "TATA Power Solar mono-PERC panels with net metering. Cut monthly bill from ₹4,200 to ₹180.",
  },
  {
    title: "Educational Campus",
    location: "Chittoor, A.P.",
    capacity: "50 kW On-Grid",
    type: "Institutional",
    year: "2023",
    blurb: "Rooftop plant powering classrooms, hostels and labs across two academic blocks.",
  },
  {
    title: "Hotel & Hospitality",
    location: "Tirumala Road",
    capacity: "30 kW Hybrid",
    type: "Commercial",
    year: "2024",
    blurb: "Hybrid system with battery backup keeps critical kitchen and lobby loads running 24x7.",
  },
  {
    title: "Industrial Shed",
    location: "Renigunta",
    capacity: "100 kW On-Grid",
    type: "Industrial",
    year: "2023",
    blurb: "Crystalline panels mounted on factory shed. Drives down operating cost for the manufacturing unit.",
  },
  {
    title: "Solar Pumpset",
    location: "Madanapalle",
    capacity: "5 HP DC Pump",
    type: "Agricultural",
    year: "2024",
    blurb: "PM-KUSUM submersible pump for groundnut and tomato irrigation. Diesel-free for the farmer.",
  },
  {
    title: "Street Lighting",
    location: "Gated Community, Tirupati",
    capacity: "40 × 24W",
    type: "Commercial",
    year: "2023",
    blurb: "Integrated solar LED street lights with motion sensors across an entire layout.",
  },
];
