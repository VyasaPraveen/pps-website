import type { Metadata } from "next";
import Link from "next/link";
import { PageHeader } from "@/components/PageHeader";
import { CTABanner } from "@/components/CTABanner";
import { SectionHeader } from "@/components/SectionHeader";
import { ArrowRightIcon, CheckIcon, LeafIcon, ShieldIcon, SunIcon } from "@/components/Icons";
import { SITE, STATS } from "@/lib/site";

export const metadata: Metadata = {
  title: "About Us",
  description:
    "Pragathi Power Solutions is the trusted solar power company in Tirupati. Authorised TATA Power Solar partners since 2012 with 13+ years of experience.",
};

export default function AboutPage() {
  return (
    <>
      <PageHeader
        title="Lighting up Tirupati with the power of the sun."
        description={`Founded in ${SITE.founded} by industry veterans, Pragathi Power Solutions is Rayalaseema's most trusted name in solar — and the authorised TATA Power Solar partner for the region.`}
        crumbs={[{ label: "Home", href: "/" }, { label: "About Us" }]}
      />

      <section className="section-pad">
        <div className="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8 grid gap-12 lg:grid-cols-2 lg:items-center">
          <div>
            <span className="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-solar-100 text-solar-700 text-xs font-semibold uppercase tracking-wider">
              Our Story
            </span>
            <h2 className="mt-4 text-3xl md:text-4xl font-bold text-sky-deep">
              Over a decade of pioneering clean energy in Rayalaseema
            </h2>
            <div className="mt-6 space-y-4 text-slate-700 leading-relaxed">
              <p>
                Pragathi Power Solutions (PPS) was founded in {SITE.founded} by{" "}
                <strong>Mr. K. Chandra Sekhar</strong> and{" "}
                <strong>Mr. Balaji Kiran Gilledu</strong> with a single mission — to put the power of the sun into every home, farm and business in Andhra Pradesh.
              </p>
              <p>
                Headquartered at Ramanujam Circle in Tirupati, we have grown into Rayalaseema&apos;s most trusted solar partner, with installations spanning residential rooftops, schools, hotels, factories and farmlands. Our designation as <strong>Authorised TATA Power Solar Partners</strong> means our customers get tier-1 panels and inverters — backed by a name India trusts.
              </p>
              <p>
                More than a decendum on, we still answer every call ourselves, run every site survey personally, and stand behind every kilowatt we install.
              </p>
            </div>
            <div className="mt-8 grid grid-cols-2 sm:grid-cols-4 gap-4">
              {STATS.map((s) => (
                <div key={s.label} className="rounded-2xl bg-solar-50 p-4 border border-solar-100">
                  <p className="text-2xl font-bold text-solar-600">
                    {s.value}
                    <span className="text-solar-500">{s.suffix}</span>
                  </p>
                  <p className="text-xs font-medium text-slate-600 mt-1">{s.label}</p>
                </div>
              ))}
            </div>
          </div>

          <div className="grid grid-cols-2 gap-4">
            <PillarCard
              icon={<SunIcon size={32} />}
              title="Mission"
              text="Make solar the default choice for every roof in Rayalaseema by 2030."
              gradient
            />
            <PillarCard
              icon={<LeafIcon size={32} />}
              title="Vision"
              text="A self-sufficient, carbon-free South India powered by clean energy."
            />
            <PillarCard
              icon={<ShieldIcon size={32} />}
              title="Values"
              text="Honest pricing, premium components, and lifelong service."
            />
            <PillarCard
              icon={<CheckIcon size={32} />}
              title="Promise"
              text="If we install it, we stand behind it. End-to-end ownership."
              gradient
            />
          </div>
        </div>
      </section>

      <section className="section-pad bg-gradient-to-b from-solar-50 to-white">
        <div className="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
          <SectionHeader
            eyebrow="Leadership"
            title="Meet the founders"
            description="Engineers and entrepreneurs who built PPS one rooftop at a time."
          />
          <div className="mt-12 grid gap-6 md:grid-cols-2 max-w-4xl mx-auto">
            {SITE.founders.map((founder, i) => (
              <article
                key={founder.name}
                className="rounded-3xl bg-white p-8 border border-solar-100 shadow-sm card-hover relative overflow-hidden"
              >
                <div
                  className={`absolute -right-12 -top-12 h-40 w-40 rounded-full ${
                    i === 0 ? "sun-gradient" : "bg-eco-500"
                  } opacity-15`}
                  aria-hidden
                />
                <div className="relative">
                  <div className="inline-flex h-20 w-20 items-center justify-center rounded-2xl sun-gradient text-white text-2xl font-bold shadow-lg">
                    {founder.name
                      .split(" ")
                      .map((p) => p.charAt(0))
                      .slice(0, 2)
                      .join("")}
                  </div>
                  <h3 className="mt-5 text-xl font-bold text-sky-deep">{founder.name}</h3>
                  <p className="text-sm font-semibold text-solar-600">{founder.role}</p>
                  <p className="mt-3 text-sm text-slate-600 leading-relaxed">
                    {i === 0
                      ? "Leads engineering, system design and large commercial deployments. Hands-on through every site assessment."
                      : "Drives strategy, partnerships and customer experience. Personally oversees the AMC and service operations."}
                  </p>
                </div>
              </article>
            ))}
          </div>
        </div>
      </section>

      <section className="section-pad">
        <div className="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
          <SectionHeader
            eyebrow="Why Choose PPS"
            title="Why families and businesses choose us"
          />
          <div className="mt-12 grid gap-5 md:grid-cols-2 lg:grid-cols-4">
            {WHY_CHOOSE.map((item) => (
              <div
                key={item.title}
                className="rounded-3xl bg-white p-6 border border-solar-100 shadow-sm card-hover"
              >
                <p className="text-3xl font-bold text-shimmer">{item.stat}</p>
                <h3 className="mt-3 font-semibold text-sky-deep">{item.title}</h3>
                <p className="mt-2 text-sm text-slate-600 leading-relaxed">{item.text}</p>
              </div>
            ))}
          </div>
          <div className="mt-12 text-center">
            <Link
              href="/services"
              className="btn-primary inline-flex items-center gap-2 rounded-full px-6 py-3 text-sm font-semibold"
            >
              Explore Our Services
              <ArrowRightIcon size={16} />
            </Link>
          </div>
        </div>
      </section>

      <CTABanner
        title="Want to know if solar is right for your home?"
        description="Book a free site survey with our Tirupati team. No commitments, just honest answers."
      />
      <div className="h-16" />
    </>
  );
}

function PillarCard({
  icon,
  title,
  text,
  gradient = false,
}: {
  icon: React.ReactNode;
  title: string;
  text: string;
  gradient?: boolean;
}) {
  return (
    <div
      className={`rounded-3xl p-6 border shadow-sm ${
        gradient
          ? "sun-gradient text-white border-transparent"
          : "bg-white border-solar-100 text-sky-deep"
      }`}
    >
      <div
        className={`inline-flex h-12 w-12 items-center justify-center rounded-xl ${
          gradient ? "bg-white/20" : "bg-solar-100 text-solar-600"
        }`}
      >
        {icon}
      </div>
      <h3 className="mt-4 text-lg font-bold">{title}</h3>
      <p
        className={`mt-2 text-sm leading-relaxed ${
          gradient ? "text-white/90" : "text-slate-600"
        }`}
      >
        {text}
      </p>
    </div>
  );
}

const WHY_CHOOSE = [
  {
    stat: "13+ yrs",
    title: "Industry Experience",
    text: "Over a decendum of pure solar focus. We've seen every roof type and use case.",
  },
  {
    stat: "TATA",
    title: "Premium Hardware",
    text: "Authorised TATA Power Solar partners. Tier-1 panels with 25-year warranty.",
  },
  {
    stat: "1500+",
    title: "Households Powered",
    text: "From village homes to gated villas, our installations span every segment.",
  },
  {
    stat: "100%",
    title: "Local Service",
    text: "Tirupati-based engineering team. We answer the phone every single time.",
  },
];
