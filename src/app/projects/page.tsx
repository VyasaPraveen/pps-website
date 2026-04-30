import type { Metadata } from "next";
import { PageHeader } from "@/components/PageHeader";
import { CTABanner } from "@/components/CTABanner";
import { SectionHeader } from "@/components/SectionHeader";
import { PROJECTS } from "@/lib/site";
import { PinIcon, SunIcon } from "@/components/Icons";

export const metadata: Metadata = {
  title: "Projects & Clients",
  description:
    "A look at solar installations delivered by Pragathi Power Solutions across Tirupati, Chittoor and Rayalaseema — residential, commercial, industrial and agricultural.",
};

const TYPE_COLORS: Record<string, string> = {
  Residential: "bg-emerald-100 text-emerald-700",
  Commercial: "bg-blue-100 text-blue-700",
  Institutional: "bg-purple-100 text-purple-700",
  Industrial: "bg-orange-100 text-orange-700",
  Agricultural: "bg-amber-100 text-amber-700",
};

export default function ProjectsPage() {
  return (
    <>
      <PageHeader
        title="Real plants. Real savings. Real customers."
        description="A snapshot of solar systems we've installed across Rayalaseema — from family rooftops to industrial sheds."
        crumbs={[{ label: "Home", href: "/" }, { label: "Projects" }]}
      />

      <section className="section-pad">
        <div className="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
          <div className="grid gap-6 md:grid-cols-2 lg:grid-cols-3">
            {PROJECTS.map((p) => (
              <article
                key={p.title + p.location}
                className="card-hover rounded-3xl bg-white border border-solar-100 shadow-sm overflow-hidden"
              >
                <div className="relative h-44 sun-gradient overflow-hidden">
                  <div className="absolute inset-0 grid-bg opacity-20" aria-hidden />
                  <div className="absolute inset-0 flex items-center justify-center text-white">
                    <SunIcon size={80} className="animate-solar-spin opacity-80" />
                  </div>
                  <span
                    className={`absolute top-4 left-4 inline-flex px-3 py-1 rounded-full text-xs font-semibold ${
                      TYPE_COLORS[p.type] ?? "bg-white text-slate-700"
                    }`}
                  >
                    {p.type}
                  </span>
                  <span className="absolute top-4 right-4 inline-flex px-3 py-1 rounded-full bg-white/90 text-sky-deep text-xs font-semibold">
                    {p.year}
                  </span>
                </div>
                <div className="p-6">
                  <h3 className="text-lg font-bold text-sky-deep">{p.title}</h3>
                  <p className="mt-1 inline-flex items-center gap-1.5 text-sm text-slate-500">
                    <PinIcon size={14} />
                    {p.location}
                  </p>
                  <p className="mt-3 inline-flex items-center px-3 py-1 rounded-full bg-solar-100 text-solar-700 text-xs font-semibold">
                    {p.capacity}
                  </p>
                  <p className="mt-4 text-sm text-slate-600 leading-relaxed">{p.blurb}</p>
                </div>
              </article>
            ))}
          </div>
        </div>
      </section>

      <section className="section-pad bg-gradient-to-b from-solar-50 to-white">
        <div className="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
          <SectionHeader
            eyebrow="By the Numbers"
            title="Solar at scale across Rayalaseema"
          />
          <div className="mt-12 grid gap-6 md:grid-cols-4">
            {[
              { v: "5+", l: "Megawatts Installed" },
              { v: "1500+", l: "Homes Powered" },
              { v: "50+", l: "Commercial Sites" },
              { v: "₹4Cr+", l: "Annual Savings (Customer)" },
            ].map((s) => (
              <div
                key={s.l}
                className="rounded-3xl sun-gradient text-white p-6 text-center shadow-lg"
              >
                <p className="text-4xl font-bold">{s.v}</p>
                <p className="mt-2 text-sm font-medium text-white/90">{s.l}</p>
              </div>
            ))}
          </div>
        </div>
      </section>

      <section className="section-pad">
        <div className="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
          <SectionHeader
            eyebrow="Sectors"
            title="We power every kind of property"
          />
          <div className="mt-12 grid gap-5 md:grid-cols-2 lg:grid-cols-3">
            {SECTORS.map((s) => (
              <div
                key={s.title}
                className="rounded-3xl bg-white p-6 border border-solar-100 shadow-sm card-hover"
              >
                <div className="text-3xl">{s.emoji}</div>
                <h3 className="mt-3 text-lg font-bold text-sky-deep">{s.title}</h3>
                <p className="mt-2 text-sm text-slate-600 leading-relaxed">{s.text}</p>
              </div>
            ))}
          </div>
        </div>
      </section>

      <CTABanner
        title="Be our next success story"
        description="Whether it's your home, factory or farm — we'll size it, finance it and switch it on."
      />
      <div className="h-16" />
    </>
  );
}

const SECTORS = [
  { emoji: "🏠", title: "Residential Homes", text: "1 kW to 10 kW rooftop systems with full subsidy assistance for individual homes and apartments." },
  { emoji: "🏨", title: "Hotels & Resorts", text: "Hybrid systems that handle 24x7 operations and ride through power cuts smoothly." },
  { emoji: "🏭", title: "Factories & Industry", text: "100 kW+ rooftop and ground-mount plants for manufacturing units across Rayalaseema." },
  { emoji: "🏫", title: "Schools & Colleges", text: "Solar campuses that cut operating budgets and teach students about clean energy." },
  { emoji: "🚜", title: "Farms & Agriculture", text: "PM-KUSUM solar pumpsets and farm electrification for irrigation and dairy." },
  { emoji: "🏘️", title: "Gated Communities", text: "Common-area lighting, water pumping and street lights — fully solar." },
];
