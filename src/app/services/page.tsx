import type { Metadata } from "next";
import { PageHeader } from "@/components/PageHeader";
import { ServiceCard } from "@/components/ServiceCard";
import { CTABanner } from "@/components/CTABanner";
import { SectionHeader } from "@/components/SectionHeader";
import { SavingsCalculator } from "@/components/SavingsCalculator";
import { ProcessTimeline } from "@/components/ProcessTimeline";
import { SERVICES } from "@/lib/site";
import { CheckIcon } from "@/components/Icons";

export const metadata: Metadata = {
  title: "Solar Services & Products",
  description:
    "Explore the complete range of solar solutions from Pragathi Power: rooftop, water heaters, street lights, fencing, pumpsets and AMC.",
};

export default function ServicesPage() {
  return (
    <>
      <PageHeader
        title="Complete solar solutions, one trusted partner."
        description="Whether you need a 1 kW home rooftop or a 100 kW industrial plant — we design, supply, install and maintain it end-to-end."
        crumbs={[{ label: "Home", href: "/" }, { label: "Services" }]}
      />

      <section className="section-pad">
        <div className="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
          <SectionHeader
            eyebrow="Our Services"
            title="Six pillars of clean energy"
            description="Every solution we offer is designed to maximise your savings, ease, and peace of mind."
          />
          <div className="mt-12 grid gap-6 md:grid-cols-2 lg:grid-cols-3">
            {SERVICES.map((s) => (
              <ServiceCard key={s.slug} service={s} />
            ))}
          </div>
        </div>
      </section>

      <section className="section-pad bg-gradient-to-b from-solar-50 to-white">
        <div className="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
          <SectionHeader
            eyebrow="System Types"
            title="On-grid, Off-grid or Hybrid?"
            description="The right configuration depends on your power-cut frequency, budget and self-consumption goals."
          />
          <div className="mt-12 grid gap-6 md:grid-cols-3">
            {SYSTEM_TYPES.map((t) => (
              <article
                key={t.title}
                className="rounded-3xl bg-white p-7 border border-solar-100 shadow-sm card-hover"
              >
                <div className="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-solar-100 text-solar-700 text-xs font-semibold uppercase tracking-wider">
                  {t.tag}
                </div>
                <h3 className="mt-4 text-xl font-bold text-sky-deep">{t.title}</h3>
                <p className="mt-2 text-sm text-slate-600 leading-relaxed">{t.text}</p>
                <ul className="mt-5 space-y-2">
                  {t.features.map((f) => (
                    <li key={f} className="flex items-start gap-2 text-sm text-slate-700">
                      <CheckIcon size={16} className="text-eco-600 mt-0.5 shrink-0" />
                      <span>{f}</span>
                    </li>
                  ))}
                </ul>
                <p className="mt-5 text-xs font-semibold uppercase tracking-wider text-solar-600">
                  Best for: {t.bestFor}
                </p>
              </article>
            ))}
          </div>
        </div>
      </section>

      <section className="section-pad">
        <div className="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
          <SectionHeader
            eyebrow="Estimate"
            title="Calculate your solar payback"
            description="A 3 kW residential plant typically pays back in under 5 years and runs for 25+."
          />
          <div className="mt-12">
            <SavingsCalculator />
          </div>
        </div>
      </section>

      <section className="section-pad bg-gradient-to-b from-white to-solar-50">
        <div className="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
          <SectionHeader
            eyebrow="Process"
            title="From enquiry to commissioning"
            description="A predictable, transparent journey. No surprises. Just sunlight to power."
          />
          <div className="mt-12">
            <ProcessTimeline />
          </div>
        </div>
      </section>

      <CTABanner
        title="Got a project in mind?"
        description="Send your latest electricity bill on WhatsApp. We'll send back a sized proposal within 24 hours."
      />
      <div className="h-16" />
    </>
  );
}

const SYSTEM_TYPES = [
  {
    tag: "Most Popular",
    title: "On-Grid Solar",
    text: "Connected to the utility grid via net metering. Excess generation flows back to DISCOM and credits your bill.",
    features: [
      "Lowest upfront cost",
      "Eligible for PM Surya Ghar subsidy",
      "Net metering with state DISCOM",
      "Fastest payback (4-6 years)",
    ],
    bestFor: "Homes & businesses with stable grid",
  },
  {
    tag: "Independent",
    title: "Off-Grid Solar",
    text: "Standalone system with battery storage. No DISCOM connection — you produce, store and consume your own power.",
    features: [
      "Complete grid independence",
      "Battery backup included",
      "Ideal for remote sites",
      "Diesel-genset replacement",
    ],
    bestFor: "Farms, telecom towers, remote homes",
  },
  {
    tag: "Best of Both",
    title: "Hybrid Solar",
    text: "Combines net metering with battery storage. You stay grid-connected and ride through outages seamlessly.",
    features: [
      "Power-cut protection",
      "Net metering benefits",
      "Critical loads always on",
      "Smart energy management",
    ],
    bestFor: "Hotels, hospitals, premium homes",
  },
];
