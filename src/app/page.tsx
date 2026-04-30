import Link from "next/link";
import { Hero } from "@/components/Hero";
import { ServiceCard } from "@/components/ServiceCard";
import { BenefitCard } from "@/components/BenefitCard";
import { ProcessTimeline } from "@/components/ProcessTimeline";
import { FAQAccordion } from "@/components/FAQAccordion";
import { SavingsCalculator } from "@/components/SavingsCalculator";
import { CTABanner } from "@/components/CTABanner";
import { SectionHeader } from "@/components/SectionHeader";
import { Logo } from "@/components/Logo";
import { BENEFITS, SERVICES, SITE } from "@/lib/site";
import { ArrowRightIcon, CheckIcon, StarIcon } from "@/components/Icons";

const TESTIMONIALS = [
  {
    name: "Ramesh Reddy",
    location: "Air Bypass Road, Tirupati",
    quote:
      "Bill went from ₹4,200 to under ₹200. Subsidy paperwork was completely handled by Pragathi team. Installation in 4 days flat.",
  },
  {
    name: "Sushma Devi",
    location: "Padmavathi Nagar",
    quote:
      "We installed 3 kW for our home and a solar water heater. Two years in and still zero issues. Their AMC team is responsive.",
  },
  {
    name: "Sri Venkateswara Hotels",
    location: "Tirumala Road",
    quote:
      "30 kW hybrid system has been a game-changer for our hospitality business. Power cuts don't bother us anymore.",
  },
];

export default function HomePage() {
  return (
    <>
      <Hero />

      <section className="section-pad">
        <div className="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
          <SectionHeader
            eyebrow="What We Offer"
            title="End-to-end solar solutions for every need"
            description="From rooftop power plants to solar pumpsets, we design, install and maintain systems that pay back fast and last decades."
          />
          <div className="mt-12 grid gap-6 sm:grid-cols-2 lg:grid-cols-3">
            {SERVICES.map((s) => (
              <ServiceCard key={s.slug} service={s} />
            ))}
          </div>
        </div>
      </section>

      <section className="section-pad bg-gradient-to-b from-solar-50 to-white">
        <div className="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
          <SectionHeader
            eyebrow="Why Solar"
            title="12 reasons to switch to solar today"
            description="Solar isn't just clean — it's the smartest financial decision a homeowner or business can make in 2026."
          />
          <div className="mt-12 grid gap-5 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4">
            {BENEFITS.map((b) => (
              <BenefitCard key={b.title} benefit={b} />
            ))}
          </div>
        </div>
      </section>

      <section className="section-pad">
        <div className="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
          <SectionHeader
            eyebrow="Calculate"
            title="See how much you save with solar"
            description="A 3 kW rooftop plant in Tirupati typically saves ₹30,000+ a year. Run the numbers for your home below."
          />
          <div className="mt-12">
            <SavingsCalculator />
          </div>
        </div>
      </section>

      <section className="section-pad bg-gradient-to-b from-white to-solar-50">
        <div className="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
          <SectionHeader
            eyebrow="How It Works"
            title="Solar in four simple steps"
            description="From the first call to the day your meter starts spinning backwards — we handle everything."
          />
          <div className="mt-12">
            <ProcessTimeline />
          </div>
        </div>
      </section>

      <section className="section-pad">
        <div className="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
          <div className="grid gap-12 lg:grid-cols-2 lg:items-center">
            <div className="relative max-w-lg mx-auto lg:mx-0">
              <div className="absolute -inset-4 sun-gradient rounded-[3rem] rotate-2 opacity-90" aria-hidden />
              <div className="absolute -inset-2 brand-gradient rounded-[3rem] -rotate-2 opacity-70" aria-hidden />
              <div className="relative bg-white rounded-[2.5rem] p-8 md:p-10 shadow-2xl">
                <Logo variant="full" className="w-full h-auto" />
                <div className="mt-6 grid grid-cols-3 gap-3 text-center">
                  <div className="rounded-xl bg-solar-50 py-3 px-2">
                    <p className="text-xl font-extrabold text-brand-navy">13+</p>
                    <p className="text-[10px] uppercase tracking-wider font-semibold text-slate-600 mt-1">Years</p>
                  </div>
                  <div className="rounded-xl bg-solar-50 py-3 px-2">
                    <p className="text-xl font-extrabold text-brand-navy">1500+</p>
                    <p className="text-[10px] uppercase tracking-wider font-semibold text-slate-600 mt-1">Homes</p>
                  </div>
                  <div className="rounded-xl bg-solar-50 py-3 px-2">
                    <p className="text-xl font-extrabold text-brand-navy">5MW+</p>
                    <p className="text-[10px] uppercase tracking-wider font-semibold text-slate-600 mt-1">Installed</p>
                  </div>
                </div>
              </div>
            </div>
            <div>
              <span className="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-solar-100 text-solar-700 text-xs font-semibold uppercase tracking-wider">
                Authorised Partner
              </span>
              <h2 className="mt-4 text-3xl md:text-4xl lg:text-5xl font-bold text-sky-deep tracking-tight">
                We&apos;re TATA Power Solar Partners in Rayalaseema
              </h2>
              <p className="mt-4 text-base md:text-lg text-slate-600 leading-relaxed">
                Pragathi Power Solutions has been a trusted name in solar since {SITE.founded}. As authorised TATA Power Solar partners, we deliver the most reliable solar technology backed by India&apos;s most trusted brand — with local service you can count on.
              </p>
              <ul className="mt-6 space-y-3">
                {[
                  "Tier-1 mono-PERC and TopCon panels",
                  "Premium string and microinverters",
                  "25-year linear performance warranty",
                  "Full subsidy & net-metering paperwork",
                  "Local Tirupati service team",
                ].map((item) => (
                  <li key={item} className="flex items-start gap-3 text-slate-700">
                    <span className="inline-flex h-6 w-6 items-center justify-center rounded-full bg-eco-500 text-white shrink-0">
                      <CheckIcon size={14} />
                    </span>
                    <span>{item}</span>
                  </li>
                ))}
              </ul>
              <div className="mt-8 flex flex-wrap gap-3">
                <Link href="/about" className="btn-primary inline-flex items-center gap-2 rounded-full px-6 py-3 text-sm font-semibold">
                  About Us
                  <ArrowRightIcon size={16} />
                </Link>
                <Link href="/projects" className="btn-outline inline-flex items-center gap-2 rounded-full px-6 py-3 text-sm font-semibold">
                  See Our Projects
                </Link>
              </div>
            </div>
          </div>
        </div>
      </section>

      <section className="section-pad bg-gradient-to-b from-solar-50 to-white">
        <div className="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
          <SectionHeader
            eyebrow="Customer Voices"
            title="Trusted by 1500+ households across Tirupati"
          />
          <div className="mt-12 grid gap-6 md:grid-cols-3">
            {TESTIMONIALS.map((t) => (
              <figure
                key={t.name}
                className="rounded-3xl bg-white border border-solar-100 p-6 shadow-sm card-hover"
              >
                <div className="flex gap-1 text-solar-500">
                  {Array.from({ length: 5 }).map((_, i) => (
                    <StarIcon key={i} size={18} />
                  ))}
                </div>
                <blockquote className="mt-3 text-slate-700 text-sm leading-relaxed">
                  &ldquo;{t.quote}&rdquo;
                </blockquote>
                <figcaption className="mt-5 flex items-center gap-3">
                  <span className="inline-flex h-10 w-10 items-center justify-center rounded-full sun-gradient text-white font-bold">
                    {t.name.charAt(0)}
                  </span>
                  <div>
                    <p className="font-semibold text-sky-deep text-sm">{t.name}</p>
                    <p className="text-xs text-slate-500">{t.location}</p>
                  </div>
                </figcaption>
              </figure>
            ))}
          </div>
        </div>
      </section>

      <section className="section-pad">
        <div className="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8 grid gap-10 lg:grid-cols-2">
          <SectionHeader
            eyebrow="FAQ"
            title="Common questions, clear answers"
            description="Everything you need to know before going solar. Still curious? Call us — we love these conversations."
            align="left"
          />
          <FAQAccordion />
        </div>
      </section>

      <CTABanner />
      <div className="h-16" />
    </>
  );
}
