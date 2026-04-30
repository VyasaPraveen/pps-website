import type { Metadata } from "next";
import { PageHeader } from "@/components/PageHeader";
import { CTABanner } from "@/components/CTABanner";
import { SectionHeader } from "@/components/SectionHeader";
import { PanelIcon, StreetLightIcon, SunIcon, ThermalIcon } from "@/components/Icons";

export const metadata: Metadata = {
  title: "Gallery",
  description:
    "Photos and visuals from solar installations completed by Pragathi Power Solutions across Tirupati and Rayalaseema.",
};

type Tile = {
  title: string;
  caption: string;
  category: "Rooftop" | "Water Heater" | "Street Light" | "Pumpset" | "Commercial";
  gradient: string;
  icon: "panel" | "thermal" | "street" | "sun";
};

const ICONS = {
  panel: PanelIcon,
  thermal: ThermalIcon,
  street: StreetLightIcon,
  sun: SunIcon,
};

const TILES: Tile[] = [
  { title: "Residential Rooftop", caption: "5 kW mono-PERC plant — Tirupati", category: "Rooftop", gradient: "from-amber-300 to-orange-500", icon: "panel" },
  { title: "Hotel Hybrid", caption: "30 kW with battery backup", category: "Commercial", gradient: "from-orange-400 to-rose-500", icon: "panel" },
  { title: "Solar Water Heater", caption: "200 LPD ETC system", category: "Water Heater", gradient: "from-sky-400 to-blue-600", icon: "thermal" },
  { title: "Integrated Street Light", caption: "24W with motion sensor", category: "Street Light", gradient: "from-yellow-400 to-amber-600", icon: "street" },
  { title: "Industrial Shed", caption: "100 kW factory rooftop", category: "Commercial", gradient: "from-orange-500 to-red-600", icon: "panel" },
  { title: "Solar Pumpset", caption: "5 HP submersible — PM-KUSUM", category: "Pumpset", gradient: "from-emerald-400 to-teal-600", icon: "sun" },
  { title: "School Campus", caption: "20 kW educational institute", category: "Rooftop", gradient: "from-purple-400 to-fuchsia-600", icon: "panel" },
  { title: "Layout Lighting", caption: "40 street lights — gated community", category: "Street Light", gradient: "from-amber-500 to-yellow-600", icon: "street" },
  { title: "Hospital Hybrid", caption: "50 kW with critical-load backup", category: "Commercial", gradient: "from-blue-500 to-indigo-700", icon: "panel" },
];

export default function GalleryPage() {
  return (
    <>
      <PageHeader
        title="Snapshots from the field."
        description="A curated look at recent installations across Tirupati, Chittoor, Madanapalle and beyond. Real plants, real customers, real sunshine."
        crumbs={[{ label: "Home", href: "/" }, { label: "Gallery" }]}
      />

      <section className="section-pad">
        <div className="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
          <SectionHeader
            eyebrow="Installations"
            title="Solar in action"
            description="Browse a sample of the systems we've delivered. We add new projects each month."
          />
          <div className="mt-12 grid gap-5 sm:grid-cols-2 lg:grid-cols-3">
            {TILES.map((tile) => {
              const Icon = ICONS[tile.icon];
              return (
                <figure
                  key={tile.title}
                  className="group relative aspect-[4/3] overflow-hidden rounded-3xl border border-solar-100 shadow-sm card-hover"
                >
                  <div className={`absolute inset-0 bg-gradient-to-br ${tile.gradient}`} />
                  <div className="absolute inset-0 grid-bg opacity-20" aria-hidden />
                  <div className="absolute inset-0 flex items-center justify-center text-white/90">
                    <Icon size={120} className="opacity-60" />
                  </div>
                  <figcaption className="absolute inset-x-0 bottom-0 p-5 bg-gradient-to-t from-black/70 via-black/30 to-transparent text-white">
                    <span className="inline-flex px-2.5 py-0.5 rounded-full bg-white/20 backdrop-blur text-[10px] font-semibold uppercase tracking-wider">
                      {tile.category}
                    </span>
                    <p className="mt-2 font-bold">{tile.title}</p>
                    <p className="text-xs text-white/80">{tile.caption}</p>
                  </figcaption>
                </figure>
              );
            })}
          </div>
        </div>
      </section>

      <CTABanner
        title="Want a virtual tour of a real installation?"
        description="Call us — we'll happily arrange a visit to a customer site close to you."
      />
      <div className="h-16" />
    </>
  );
}
